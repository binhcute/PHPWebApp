<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
session_start();

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $article = Article::all();
        return view('pages.server.article.list')
        ->with('article', $article);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.server.article.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'img' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => ['required','max:255'],
            'description' =>['required','min:20']
       ]);

        $article = new Article();
        $article->user_id = Auth::user()->id;
        $article->article_name = $request->name;
        $article->article_description = $request->description;
        $article->article_keyword = $request->keyword;
        $files = $request->file('img');
        
       // Define upload path
           $destinationPath = public_path('/server/assets/image/article'); // upload path
        // Upload Orginal Image           
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
 
           $insert['img'] = "$profileImage";
        // Save In Database
		$article->article_img="$profileImage";
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
        $article = DB::table('tpl_article')
            ->join('users', 'users.id', '=', 'tpl_article.user_id')
            ->where('article_id', $id)->first();
        return view('pages.server.article.show')
        ->with('article', $article);

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
        return view('pages.server.article.edit')->with('article', $article);
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
        $article->user_id = Auth::user()->id;
        $article->article_name = $request->name;
        $article->article_description = $request->description;
        $article->article_keyword = $request->keyword;
        $files = $request->file('img');
        if ($files != NULL) {
       // Define upload path
           $destinationPath = public_path('/server/assets/image/article'); // upload path
        // Upload Orginal Image           
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
 
           $insert['img'] = "$profileImage";
        // Save In Database
		$article->article_img="$profileImage";
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

    public function disabled($id)
    {
        $article = article::find($id);
        $article->status = 0;
        $article->save();
        Session::put('info', 'Đã Ẩn Bài Viết');
        return redirect()->route('BaiViet.index');
    }
    public function enabled($id)
    {
        $article = article::find($id);
        $article->status = 1 ;
        $article->save();
        Session::put('info', 'Đã Hiển Thị Bài Viết');
        return redirect()->route('BaiViet.index');
    }
}
