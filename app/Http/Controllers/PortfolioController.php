<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;



class PortfolioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $port = DB::table('tpl_portfolio')
            ->orderBy('port_id', 'desc')->get();
        return view('pages.server.portfolio.list')
            ->with('port', $port);
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
            'name' => ['required', 'max:255']
        ]);
        $port = new Portfolio();
        $port->user_id = Auth::user()->id;
        $port->port_name = $request->name;
        $port->port_description = $request->description;
        $port->port_origin = $request->origin;
        $port->status = $request->status;
        $files = $request->file('avatar');

        if ($files != NULL) {
        // Define upload path
        $destinationPath = public_path('/server/assets/image/portfolio/avatar'); // upload path
        // Upload Orginal Image           
        $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
        $files->move($destinationPath, $profileImage);

        $insert['avatar'] = "$profileImage";
        // Save In Database
        $port->port_avatar = "$profileImage";
        }

        $files = $request->file('img');

        if ($files != NULL) {
        // Define upload path
        $destinationPath = public_path('/server/assets/image/portfolio'); // upload path
        // Upload Orginal Image           
        $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
        $files->move($destinationPath, $profileImage);

        $insert['img'] = "$profileImage";
        // Save In Database
        $port->port_img = "$profileImage";
        }
        $port->save();
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
        $port = DB::table('tpl_portfolio')
            ->join('users', 'users.id', '=', 'tpl_portfolio.user_id')
            ->where('port_id', $id)->first();
        return view('pages.server.portfolio.show')
            ->with('port', $port);
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
        $port = Portfolio::find($id);
        return view('pages.server.portfolio.edit')
            ->with('port', $port)
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
        $port = Portfolio::find($id);
        $port->user_id = Auth::user()->id;
        $port->port_name = $request->name;
        $port->port_description = $request->description;
        $port->port_origin = $request->origin;
        $files = $request->file('avatar');

        if ($files != NULL) {
            // Define upload path
            $destinationPath = public_path('/server/assets/image/portfolio/avatar'); // upload path
            // Upload Orginal Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);

            $insert['avatar'] = "$profileImage";
            // Save In Database
            $port->port_img = "$profileImage";
        }
        $files = $request->file('img');

        if ($files != NULL) {
            // Define upload path
            $destinationPath = public_path('/server/assets/image/portfolio'); // upload path
            // Upload Orginal Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);

            $insert['img'] = "$profileImage";
            // Save In Database
            $port->port_img = "$profileImage";
        }
        $port->save();
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
        $port = Portfolio::find($id);
        $port->delete();
        Session::put('destroy', 'Đã Xóa Nhà Cung Cấp');
        return redirect()->route('NhaCungCap.index');
    }

    public function disabled($id)
    {
        $port = Portfolio::find($id);
        $port->status = 0;
        $port->save();
        Session::put('info', 'Đã Ẩn Nhà Cung Cấp');
        return redirect()->route('NhaCungCap.index');
    }
    public function enabled($id)
    {
        $port = Portfolio::find($id);
        $port->status = 1;
        $port->save();
        Session::put('info', 'Đã Hiển Thị Nhà Cung Cấp');
        return redirect()->route('NhaCungCap.index');
    }
}
