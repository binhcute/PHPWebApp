<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategories;
use App\Models\Portfolio;
use App\Models\Color;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Session;

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
        $product->id_portfolio = $request->id_portfolio;
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
            'id_cate' => ['required'],
            'id_portfolio' => ['required'],
            'id_color' => ['required'],
            'img' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'img_hover' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'name' => ['required','max:255'],
            'price' => ['required'],
            'series' => ['required'],
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
        
        $files = $request->file('img_hover');
       // Define upload path
       $destinationPath = public_path('/server/assets/images/product/hover'); // upload path
       // Upload Orginal Image           
          $profileImage = date('YmdHis') . "." . $files->getClientOriginalExtension();
          $files->move($destinationPath, $profileImage);

          $insert['img_hover'] = "$profileImage";
       // Save In Database
       $product->img_hover="$profileImage";

       
        $inserts = [];
        foreach ($request->file('slide_img') as $key=>$file){
            // Define upload path
           $destinationPath = public_path('/server/assets/images/product/slide'); // upload path
        // Upload Orginal Image           
           $slide_profileImage = date('YmdHis'). "_" . $key . "." . $file->getClientOriginalExtension();

           $file->move($destinationPath, $slide_profileImage);

           
           array_push($inserts,$slide_profileImage);
           //mảng 1 chiều
        //    $array = [
        //        'key' => $value,
        //    ];
           
        //    //mảng 2 chiều rồi khác gì cái trên
           
        //    $array = [
        //     'key' => [
        //         'key'=> $value,
        //     ],
        // ];
        // // Save In Database
		// $product->slide_img="$slide_profileImage";
        }   
        $product->slide_img = json_encode($insert);// xài json_decode
        $product->properties = NULL;
        $product->view = NULL;
        $product->save();
        if($product){
            Session::flash('success', 'Create Product Successfully');
        }
        else{
            Session::flash('error', 'Dont Create Product Successfully');
        }
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
        
        $cate = Product::find($id)->categories->name;

        $port = Product::find($id)->portfolio->name;
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
