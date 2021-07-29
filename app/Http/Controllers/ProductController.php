<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;



class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = DB::table('tpl_product')
            ->join('tpl_category', 'tpl_category.cate_id', '=', 'tpl_product.cate_id')
            ->join('tpl_portfolio', 'tpl_portfolio.port_id', '=', 'tpl_product.port_id')
            ->orderBy('product_id', 'desc')->get();
        return view('pages.server.product.list')
            ->with('product', $product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $port = DB::table('tpl_portfolio')
            ->orderBy('port_id', 'desc')->get();
        $cate = DB::table('tpl_category')
            ->orderBy('cate_id', 'desc')->get();
        return view('pages.server.product.add')
            ->with('cate', $cate)
            ->with('port', $port);
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
            'cate_id' => ['required'],
            'port_id' => ['required'],
            'img' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => ['required', 'max:255'],
            'price' => ['required']
        ]);
        $product = new Product();
        $product->cate_id = $request->cate_id;
        $product->port_id = $request->port_id;
        $product->user_id = Auth::user()->id;
        $product->product_name = $request->name;
        $product->product_price = $request->price;
        $product->product_color = $request->color;
        $product->product_description = $request->description;
        $product->product_quantity = $request->quantity;
        $product->product_keyword = $request->keyword;
        $product->status = $request->status;
        $product->view = NULL;
        $files = $request->file('img');
        // Define upload path
        $destinationPath = public_path('/server/assets/image/product'); // upload path
        // Upload Orginal Image           
        $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
        $files->move($destinationPath, $profileImage);

        $insert['img'] = "$profileImage";
        // Save In Database
        $product->product_img = "$profileImage";

        //Hover
        $files = $request->file('img_hover');
        if ($files != null) {
            // Define upload path
            $destinationPath = public_path('/server/assets/image/product/hover'); // upload path
            // Upload Orginal Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);

            $insert['img_hover'] = "$profileImage";
            // Save In Database
            $product->product_img_hover = "$profileImage";
        }
        $product->save();
        Session::put('message', 'Thêm Sản Phẩm Thành Công');
        return redirect()->route('SanPham.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = DB::table('tpl_product')
            ->join('tpl_category', 'tpl_category.cate_id', '=', 'tpl_product.cate_id')
            ->join('tpl_portfolio', 'tpl_portfolio.port_id', '=', 'tpl_product.port_id')
            ->join('users', 'users.id', '=', 'tpl_product.user_id')
            ->where('product_id', $id)->first();
        return view('pages.server.product.show')
            ->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        $cate = DB::table('tpl_category')
            ->orderBy('cate_id', 'desc')->get();
        $port = DB::table('tpl_portfolio')
            ->orderBy('port_id', 'desc')->get();
        return view('pages.server.product.edit')
            ->with('product', $product)
            ->with('cate', $cate)
            ->with('port', $port);
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
        $product = Product::find($id);
        $product->cate_id = $request->cate_id;
        $product->port_id = $request->port_id;
        $product->user_id = Auth::user()->id;
        $product->product_name = $request->name;
        $product->product_price = $request->price;
        $product->product_description = $request->description;
        $product->product_color = $request->color;
        $product->product_quantity = $request->quantity;
        $product->product_keyword = $request->keyword;
        $product->view = NULL;
        $files = $request->file('img');
        if ($files != NULL) {
            // Define upload path
            $destinationPath = public_path('/server/assets/image/product'); // upload path
            // Upload Orginal Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);


            $insert['img'] = "$profileImage";
            // Save In Database
            $product->product_img = "$profileImage";
        }
        $files = $request->file('img_hover');
        if ($files != NULL) {
            // Define upload path
            $destinationPath = public_path('/server/assets/image/product/hover'); // upload path
            // Upload Orginal Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);


            $insert['img'] = "$profileImage";
            // Save In Database
            $product->product_img_hover = "$profileImage";
        }
        $product->save();
        Session::put('message', 'Cập Nhật Sản Phẩm Thành Công');
        return redirect()->route('SanPham.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        Session::put('destroy', 'Đã Xóa Sản Phẩm');
        return redirect()->route('SanPham.index');
    }
    public function disabled($id)
    {
        $product = Product::find($id);
        $product->status = 0;
        $product->save();
        Session::put('info', 'Đã Ẩn Sản Phẩm');
        return redirect()->route('SanPham.index');
    }
    public function enabled($id)
    {
        $product = Product::find($id);
        $product->status = 1;
        $product->save();
        Session::put('info', 'Đã Hiển Thị Sản Phẩm');
        return redirect()->route('SanPham.index');
    }
}
