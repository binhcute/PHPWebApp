<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProductCategories;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product_category = ProductCategories::paginate(10);
        return view('pages.server.productcategorieslist')->with('product_category', $product_category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.server.productcategoriesadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_categories = new ProductCategories();
        $product_categories->id_user = Auth::user()->id;
        $product_categories->name = $request->name;
        $product_categories->detail = $request->detail;
        $product_categories->keyword = $request->keyword;
        $files = $request->file('img');
        $request->validate([
            'img' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => ['required','max:255'],
            'detail' =>['required','min:20'],
            'keyword' => ['required']
       ]);
       // Define upload path
           $destinationPath = public_path('/server/assets/images/productcategory'); // upload path
        // Upload Orginal Image           
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
 
           $insert['img'] = "$profileImage";
        // Save In Database
		$product_categories->img="$profileImage";
        // $properties = Collection::make([
        //     $request->name,
        //     $request->detail,
        //     $request->keyword,
        //     $request->img,
        //     ])->all();
        $product_categories->properties = NULL;
        $product_categories->save();
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
        $product_categories = ProductCategories::find($id);
        return view('pages.server.productcategoriesshow')->with('product_categories', $product_categories);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product_categories = ProductCategories::find($id);
        return view('pages.server.productcategoriesedit')->with('product_categories', $product_categories);
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
        $product_categories = ProductCategories::find($id);
        $product_categories->id_user = $request->id_user;
        $product_categories->name = $request->name;
        $product_categories->detail = $request->detail;
        $product_categories->keyword = $request->keyword;
        $product_categories->properties = NULL;
        $files = $request->file('img');
        $request->validate([
            'img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => ['required','max:255'],
            'detail' =>['required','min:20'],
            'keyword' => ['required']
       ]);
       // Define upload path
           $destinationPath = public_path('/server/assets/images/productcategory'); // upload path
        // Upload Orginal Image           
           $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
           $files->move($destinationPath, $profileImage);
 
           $insert['img'] = "$profileImage";
        // Save In Database
		$product_categories->img="$profileImage";

        $product_categories->save();
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
        $product_categories = ProductCategories::find($id);
        $product_categories->delete();
        return redirect()->route('LoaiSanPham.index');
    }

    public function disabled(Request $request, $id)
    {
        $product_categories = ProductCategories::find($id);
        $product_categories->status = 0;
        $product_categories->save();
        return redirect()->route('LoaiSanPham.index');
    }
    public function enabled(Request $request, $id)
    {
        $product_categories = ProductCategories::find($id);
        $product_categories->status = 1 ;
        $product_categories->save();
        return redirect()->route('LoaiSanPham.index');
    }
}
