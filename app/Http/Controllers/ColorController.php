<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Color;
use Illuminate\Support\Facades\Auth;
use Session;
// session_start();

class ColorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $color = Color::paginate(10);
        return view('pages.server.colorlist')->with('color', $color);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.server.coloradd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $color = new Color();
        $color->id_user = Auth::user()->id;
        $color->name = $request->name;
        $color->primary_color = $request->primary_color;
        $color->primary_color_opacity = $request->primary_color_opacity;
        $color->status = $request->status;
        $color->save();
        Session::put('message', 'Thêm Màu Thành Công');
        return redirect()->route('MauSac.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $color = Color::find($id);
        $user = Color::find($id)->User->name;
        return view('pages.server.colorshow')
        ->with('color', $color)
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
        $color = Color::find($id);
        return view('pages.server.coloredit')->with('color', $color);
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
        $color = Color::find($id);
        $color->name = $request->name;
        $color->primary_color = $request->primary_color;
        $color->primary_color_opacity = $request->primary_color_opacity;
        $color->save();
        Session::put('message', 'Cập Nhật Màu Thành Công');
        return redirect()->route('MauSac.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $color = Color::find($id);
        $color->delete();
        Session::put('detroy', 'Đã Xóa Màu');
        return redirect()->route('MauSac.index');
    }

    public function disabled(Request $request, $id)
    {
        $color = Color::find($id);
        $color->status = 0;
        $color->save();
        Session::put('info', 'Đã Ẩn Màu');
        return redirect()->route('MauSac.index');
    }
    public function enabled(Request $request, $id)
    {
        $color = Color::find($id);
        $color->status = 1 ;
        $color->save();
        Session::put('info', 'Đã Hiển Thị Màu');
        return redirect()->route('MauSac.index');
    }
}
