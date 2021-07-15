<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Session;
// session_start();

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::paginate(10);
        return view('pages.server.articlelist')->with('article', $article);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.server.articleadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $article = new article();
        $article->id_user = Auth::user()->id;
        $article->name = $request->name;
        $article->detail = $request->detail;
        $article->keyword = $request->keyword;
        $files = $request->file('img');
        $request->validate([
            'img' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => ['required','max:255'],
            'detail' =>['required','min:20']
       ]);
       // Define upload path
           $destinationPath = public_path('/server/assets/images/article'); // upload path
        // Upload Orginal Image           
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
 
           $insert['img'] = "$profileImage";
        // Save In Database
		$article->img="$profileImage";
        $article->status = $request->status;
        $article->save();
        Session::put('message', 'Thêm Bài Viết Thành Công');
        return redirect()->route('BaiViet.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = article::find($id);
        $user = Article::find($id)->User->name;
        return view('pages.server.articleshow')
        ->with('article', $article)
        ->with('user', $user);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $article = article::find($id);
        return view('pages.server.articleedit')->with('article', $article);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $article = Article::find($id);
        $article->id_user = Auth::user()->id;
        $article->name = $request->name;
        $article->detail = $request->detail;
        $article->keyword = $request->keyword;
        $files = $request->file('img');
        if ($files != NULL) {
       // Define upload path
           $destinationPath = public_path('/server/assets/images/article'); // upload path
        // Upload Orginal Image           
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
 
           $insert['img'] = "$profileImage";
        // Save In Database
		$article->img="$profileImage";
        }
        $article->save();
        Session::put('message', 'Cập Nhật Bài ViếtThành Công');
        return redirect()->route('BaiViet.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $article = article::find($id);
        $article->delete();
        Session::put('detroy', 'Đã Xóa Bài Viết');
        return redirect()->route('BaiViet.index');
    }

    public function disabled(Request $request, $id)
    {
        $article = article::find($id);
        $article->status = 0;
        $article->save();
        Session::put('info', 'Đã Ẩn Bài Viết');
        return redirect()->route('BaiViet.index');
    }
    public function enabled(Request $request, $id)
    {
        $article = article::find($id);
        $article->status = 1 ;
        $article->save();
        Session::put('info', 'Đã Hiển Thị Bài Viết');
        return redirect()->route('BaiViet.index');
    }
}
