<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategories;
use App\Models\Portfolio;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Session;
// session_start();

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::paginate(10);
        $portfolio = Portfolio::all();
        $product_categories = ProductCategories::all();
        return view('pages.server.productlist')
            ->with('product', $product)
            ->with('product_categories', $product_categories)
            ->with('portfolio', $portfolio);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $portfolio = Portfolio::all();
        $product_categories = ProductCategories::all();
        return view('pages.server.productadd')
        ->with('product_categories', $product_categories)
        ->with('portfolio', $portfolio);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = new Product();
        $product->id_cate = $request->id_cate;
        $product->id_portfolio = $request->id_portfolio;
        $product->id_user = Auth::user()->id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->color = $request->color;
        $product->detail = $request->detail;
        $product->quantity = $request->quantity;
        $product->keyword = $request->keyword;
        $product->status = $request->status;
        $product->view = NULL;
        $files = $request->file('img');
        $request->validate([
            'id_cate' => ['required'],
            'id_portfolio' => ['required'],
            'img' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => ['required', 'max:255'],
            'price' => ['required']
        ]);
        // Define upload path
        $destinationPath = public_path('/server/assets/images/product'); // upload path
        // Upload Orginal Image           
        $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
        $files->move($destinationPath, $profileImage);

        $insert['img'] = "$profileImage";
        // Save In Database
        $product->img = "$profileImage";

        //Hover
        $files = $request->file('img_hover');
        if($files != null) {
        // Define upload path
        $destinationPath = public_path('/server/assets/images/product/hover'); // upload path
        // Upload Orginal Image           
        $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
        $files->move($destinationPath, $profileImage);

        $insert['img_hover'] = "$profileImage";
        // Save In Database
        $product->img_hover = "$profileImage";
        $product->save();
        Session::put('message', 'Thêm Sản Phẩm Thành Công');
        return redirect()->route('SanPham.index');
        }
        else{            
        $product->img_hover = NULL;
        $product->save();
        Session::put('message', 'Thêm Sản Phẩm Thành Công');
        return redirect()->route('SanPham.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        $portfolio = Product::find($id)->portfolio->name;
        $user = Product::find($id)->User->name;
        $product_categories = Product::find($id)->categories->name;
        return view('pages.server.productshow')
            ->with('product', $product)
            ->with('product_categories', $product_categories)
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

        $product = Product::find($id);
        $product_categories = DB::table('product_categories')->orderBy('id', 'desc')->get();
        $portfolio = DB::table('portfolios')->orderBy('id', 'desc')->get();

        return view('pages.server.productedit')
            ->with('product', $product)
            ->with('product_categories', $product_categories)
            ->with('portfolio', $portfolio);
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
        $product->id_cate = $request->id_cate;
        $product->id_portfolio = $request->id_port;
        $product->id_user = Auth::user()->id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->detail = $request->detail;
        $product->color = $request->color;
        $product->quantity = $request->quantity;
        $product->keyword = $request->keyword;
        $product->view = NULL;
        $files = $request->file('img');
        if ($files != NULL) {
            // Define upload path
            $destinationPath = public_path('/server/assets/images/product'); // upload path
            // Upload Orginal Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);


            $insert['img'] = "$profileImage";
            // Save In Database
            $product->img = "$profileImage";
        }
        $files = $request->file('img_hover');
        if ($files != NULL) {
            // Define upload path
            $destinationPath = public_path('/server/assets/images/product/hover'); // upload path
            // Upload Orginal Image           
            $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
            $files->move($destinationPath, $profileImage);


            $insert['img'] = "$profileImage";
            // Save In Database
            $product->img_hover = "$profileImage";
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
        Session::put('detroy', 'Đã Xóa Sản Phẩm');
        return redirect()->route('SanPham.index');
    }

    public function disabled(Request $request, $id)
    {
        $product = Product::find($id);
        $product->status = 0;
        $product->save();
        Session::put('info', 'Đã Ẩn Sản Phẩm');
        return redirect()->route('SanPham.index');
    }
    public function enabled(Request $request, $id)
    {
        $product = Product::find($id);
        $product->status = 1;
        $product->save();
        Session::put('info', 'Đã Hiển Thị Sản Phẩm');
        return redirect()->route('SanPham.index');
    }
}
