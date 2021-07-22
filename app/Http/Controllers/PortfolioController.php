<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
        $portfolio = DB::table('tpl_portfolio')
            ->orderBy('port_id', 'desc')->get();
        return view('pages.server.portfolio.list')
            ->with('portfolio', $portfolio);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.server.portfolio.add');
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
            'name' => ['required', 'max:255']
        ]);
        $portfolio = new Portfolio();
        $portfolio->user_id = Auth::user()->id;
        $portfolio->port_name = $request->name;
        $portfolio->port_description = $request->description;
        $portfolio->port_origin = $request->origin;
        $portfolio->status = $request->status;
        $files = $request->file('img');

        // Define upload path
        $destinationPath = public_path('/server/assets/image/portfolio'); // upload path
        // Upload Orginal Image           
        $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
        $files->move($destinationPath, $profileImage);

        $insert['img'] = "$profileImage";
        // Save In Database
        $portfolio->port_img = "$profileImage";
        $portfolio->save();
        Session::put('message', 'Thêm Nhà Cung Cấp Thành Công');
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
        $portfolio = DB::table('tpl_portfolio')
            ->join('users', 'users.id', '=', 'tpl_portfolio.user_id')
            ->where('port_id', $id)->first();
        return view('pages.server.portfolio.show')
            ->with('portfolio', $portfolio);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = DB::table('users')
            ->orderBy('id', 'desc')->get();
        $portfolio = Portfolio::find($id);
        return view('pages.server.portfolio.edit')
            ->with('portfolio', $portfolio)
            ->with('user', $user);
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
        $portfolio->user_id = Auth::user()->id;
        $portfolio->port_name = $request->name;
        $portfolio->port_description = $request->description;
        $portfolio->port_origin = $request->origin;
        $files = $request->file('img');

        if ($files != NULL) {
            // Define upload path
            $destinationPath = public_path('/server/assets/image/portfolio'); // upload path
            // Upload Orginal Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);

            $insert['img'] = "$profileImage";
            // Save In Database
            $portfolio->port_img = "$profileImage";
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
        Session::put('destroy', 'Đã Xóa Nhà Cung Cấp');
        return redirect()->route('NhaCungCap.index');
    }

    public function disabled($id)
    {
        $portfolio = Portfolio::find($id);
        $portfolio->status = 0;
        $portfolio->save();
        Session::put('info', 'Đã Ẩn Nhà Cung Cấp');
        return redirect()->route('NhaCungCap.index');
    }
    public function enabled($id)
    {
        $portfolio = Portfolio::find($id);
        $portfolio->status = 1;
        $portfolio->save();
        Session::put('info', 'Đã Hiển Thị Nhà Cung Cấp');
        return redirect()->route('NhaCungCap.index');
    }
}
