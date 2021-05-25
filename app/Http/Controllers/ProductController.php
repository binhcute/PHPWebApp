<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategories;

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
        $product_categories = ProductCategories::all();
        return view('pages.server.productlist')->with('product', $product)->with('product_categories', $product_categories);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        $product_categories = ProductCategories::all();
        return view('pages.server.productadd')->with('product_categories', $product_categories);
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
        $product->name = $request->name;
        $product->price = $request->price;
        $product->color = $request->color;
        $product->detail = $request->detail;
        $product->quantity = $request->quantity;
        $product->keyword = $request->keyword;
        $files = $request->file('img');
        $request->validate([
            'img' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => ['required','max:255'],
            'detail' =>['required','min:20'],
            'keyword' => ['required']
       ]);
       // Define upload path
           $destinationPath = public_path('/server/assets/images/product'); // upload path
        // Upload Orginal Image           
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
 
           $insert['img'] = "$profileImage";
        // Save In Database
		$product->img="$profileImage";
        // $properties = Collection::make([
        //     $request->name,
        //     $request->detail,
        //     $request->keyword,
        //     $request->img,
        //     ])->all();
        $product->properties = NULL;
        $product->view = NULL;
        $product->save();
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
        $product = Product::find($id);
        $product_categories = ProductCategories::all();
        return view('pages.server.productshow')->with('product', $product)->with('product_categories', $product_categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_categories = ProductCategories::all();
        $product = Product::find($id);
        return view('pages.server.productedit')->with('product', $product)->with('product_categories', $product_categories);
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
        $product->name = $request->name;
        $product->price = $request->price;
        $product->color = $request->color;
        $product->detail = $request->detail;
        $product->quantity = $request->quantity;
        $product->keyword = $request->keyword;
        $files = $request->file('img');
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => ['required','max:255'],
            'detail' =>['required','min:20'],
            'keyword' => ['required']
       ]);
       // Define upload path
           $destinationPath = public_path('/server/assets/images/product'); // upload path
        // Upload Orginal Image           
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
 
           $insert['img'] = "$profileImage";
        // Save In Database
		$product->img="$profileImage";
        $product->properties = NULL;
        $product->view = NULL;
        $product->save();
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
        return redirect()->route('SanPham.index');
    }

    public function disabled(Request $request, $id)
    {
        $product = Product::find($id);
        $product->status = 0;
        $product->save();
        return redirect()->route('SanPham.index');
    }
    public function enabled(Request $request, $id)
    {
        $product = Product::find($id);
        $product->status = 1 ;
        $product->save();
        return redirect()->route('SanPham.index');
    }
}
