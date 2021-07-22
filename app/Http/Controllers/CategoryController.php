<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

session_start();

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        return view('pages.server.Category.list')->with('category', $category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.server.Category.add');
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
            'name' => ['required', 'max:255'],
        ]);
        $category = new Category();
        $category->user_id = Auth::user()->id;
        $category->cate_name = $request->name;
        $category->cate_description = $request->description;
        $category->status = $request->status;
        $files = $request->file('img');
        // Define upload path
        $destinationPath = public_path('/server/assets/image/category'); // upload path
        // Upload Orginal Image           
        $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
        $files->move($destinationPath, $profileImage);

        $insert['img'] = "$profileImage";
        // Save In Database
        $category->cate_img = "$profileImage";

        $category->save();
        Session::put('message', 'Thêm Loại Sản Phẩm Thành Công');
        return redirect()->route('LoaiSanPham.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category = DB::table('tpl_category')
            ->join('users', 'users.id', '=', 'tpl_category.user_id')
            ->where('cate_id', $id)->first();
        return view('pages.server.Category.show')
        ->with('category', $category);
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
            ->orderBy('id', 'desc')->first();
        $category = Category::find($id);
        return view('pages.server.Category.edit')
        ->with('category', $category)
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
        $category = Category::find($id);
        $category->user_id = Auth::user()->id;
        $category->cate_name = $request->name;
        $category->cate_description = $request->description;
        $files = $request->file('img');
        if ($files != NULL) {
            // Define upload path
            $destinationPath = public_path('/server/assets/image/category'); // upload path
            // Upload Orginal Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);

            $insert['img'] = "$profileImage";
            // Save In Database
            $category->cate_img = "$profileImage";
        }
        $category->save();
        Session::put('message', 'Cập Nhật Loại Sản Phẩm Thành Công');
        return redirect()->route('LoaiSanPham.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();
        Session::put('detroy', 'Đã Xóa Loại Sản Phẩm');
        return redirect()->route('LoaiSanPham.index');
    }

    public function disabled($id)
    {
        $category = Category::find($id);
        $category->status = 0;
        $category->save();
        Session::put('info', 'Đã Ẩn Loại Sản Phẩm');
        return redirect()->route('LoaiSanPham.index');
    }
    public function enabled($id)
    {
        $category = Category::find($id);
        $category->status = 1;
        $category->save();
        Session::put('info', 'Đã Hiển Thị Loại Sản Phẩm');
        return redirect()->route('LoaiSanPham.index');
    }
}

