<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Auth;
use Session;
session_start();

class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $portfolio = Portfolio::paginate(10);
        return view('pages.server.portfoliolist')->with('portfolio', $portfolio);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.server.portfolioadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $portfolio = new Portfolio();
        $portfolio->id_user = Auth::user()->id;
        $portfolio->name = $request->name;
        $portfolio->detail = $request->detail;
        $files = $request->file('img');
        $request->validate([
            'img' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => ['required','max:255'],
            'detail' =>['required','min:20']
       ]);
       // Define upload path
           $destinationPath = public_path('/server/assets/images/portfolio'); // upload path
        // Upload Orginal Image           
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
 
           $insert['img'] = "$profileImage";
        // Save In Database
		$portfolio->img="$profileImage";
        $portfolio->status = $request->status;
        $portfolio->save();
        Session::put('message','Thêm Nhà Cung Cấp Thành Công');
        return redirect()->route('NhaCungCap.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $portfolio = Portfolio::find($id);
        $user = Portfolio::find($id)->User->name;
        return view('pages.server.portfolioshow')
        ->with('portfolio', $portfolio)
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
        $portfolio = Portfolio::find($id);
        return view('pages.server.portfolioedit')->with('portfolio', $portfolio);
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
        $portfolio = Portfolio::find($id);
        $portfolio->id_user = Auth::user()->id;
        $portfolio->name = $request->name;
        $portfolio->detail = $request->detail;
        $files = $request->file('img');
        if($files!=NULL){
       // Define upload path
           $destinationPath = public_path('/server/assets/images/portfolio'); // upload path
        // Upload Orginal Image           
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
 
           $insert['img'] = "$profileImage";
        // Save In Database
		$portfolio->img="$profileImage";
        $portfolio->status = $request->status;
        }
        $portfolio->save();
        Session::put('message', 'Cập Nhật Nhà Cung Cấp Thành Công');
        return redirect()->route('NhaCungCap.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $portfolio = Portfolio::find($id);
        $portfolio->delete();
        Session::put('destroy','Đã Xóa Nhà Cung Cấp');
        return redirect()->route('NhaCungCap.index');
    }

    public function disabled(Request $request, $id)
    {
        $portfolio = Portfolio::find($id);
        $portfolio->status = 0;
        $portfolio->save();
        Session::put('info','Đã Ẩn Nhà Cung Cấp');
        return redirect()->route('NhaCungCap.index');
    }
    public function enabled(Request $request, $id)
    {
        $portfolio = Portfolio::find($id);
        $portfolio->status = 1 ;
        $portfolio->save();
        Session::put('info','Đã Hiển Thị Nhà Cung Cấp');
        return redirect()->route('NhaCungCap.index');
    }
}
