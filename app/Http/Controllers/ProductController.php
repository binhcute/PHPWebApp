<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategories;
use App\Models\Portfolio;
use App\Models\Color;
use Illuminate\Support\Facades\Auth;

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
        $color = Color::all();
        $product_categories = ProductCategories::all();
        return view('pages.server.productlist')
        ->with('product', $product)->with('product_categories', $product_categories)->with('portfolio', $portfolio)->with('color', $color);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $portfolio = Portfolio::all();
        $color = Color::all();
        $product_categories = ProductCategories::all();
        return view('pages.server.productadd')->with('product_categories', $product_categories)->with('portfolio', $portfolio)->with('color', $color);
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
        $product->id_portfolio = $request->id_port;
        $product->id_color = $request->id_color;
        $product->id_user = Auth::user()->id;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->series = $request->series;
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
        // $array[] = Product::$array  ;
        // $product->properties = "$array";
        // $product->properties = $request->name $request->id_cate, $request->price,
        // $request->color,$request->detail,$request->keyword,
        // $request->quantity,$request->img;
        
        //
        
        foreach ($request->file('slide_img') as $file){
            
            // Define upload path
           $destinationPath = public_path('/server/assets/images/product/hover'); // upload path
        // Upload Orginal Image           
           $slide_profileImage = date('YmdHis') . "." . $file->getClientOriginalExtension();
//            echo "<pre>";
//     print_r($slide_profileImage);
// echo "</pre>";
// exit();
           $file->move($destinationPath, $slide_profileImage);
 
           $inserts[] = "$slide_profileImage";
        // // Save In Database
		// $product->slide_img="$slide_profileImage";
        }
        $product->slide_img = $inserts;
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
        $color = Color::all();
        $portfolio = Portfolio::all();
        $product_categories = ProductCategories::all();
        return view('pages.server.productshow')->with('product', $product)->with('product_categories', $product_categories)->with('portfolio', $portfolio)->with('color', $color);
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
        $color = Color::all();
        $portfolio = Portfolio::all();
        $product = Product::find($id);
        $cate = ProductCategories::find($id);
        $cate->Product;
        $port = Portfolio::find($id);
        $port->Product;
        return view('pages.server.productedit')
        ->with('product', $product)->with('product_categories', $product_categories)->with('portfolio', $portfolio)->with('color', $color)
        ->with('cate', $cate)->with('port',$port);
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
        $product->id_portfolio = $request->id_portfolio;
        $product->id_color = $request->id_color;
        $product->id_user = Auth::user()->id;
        $product->id_portfolio = $request->id_portfolio;
        $product->series = $request->series;
        $product->name = $request->name;
        $product->price = $request->price;
        $product->series = $request->series;
        $product->detail = $request->detail;
        $product->quantity = $request->quantity;
        $product->keyword = $request->keyword;
        $files = $request->file('img');
        if($files!=NULL){
            // Define upload path
           $destinationPath = public_path('/server/assets/images/product'); // upload path
           // Upload Orginal Image           
              $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
              $files->move($destinationPath, $profileImage);
    
              $insert['img'] = "$profileImage";
           // Save In Database
           $product->img="$profileImage";
          
        }
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
