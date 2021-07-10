<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index(){
        $product = DB::table('products')->where('status',1)->orderBy('price','desc')->limit(5)->get();
        $product_cate = DB::select('select * from product_categories where status = ?', [1]);
        return view('pages.client.index')->with('product', $product)->with('product_cate', $product_cate);
    }
    public function about_us(){
        return view('pages.client.aboutUs');
    }
    public function article(){
        return view('pages.client.articlelist');
    }
    public function article_detail(){
        return view('pages.client.articledetail');
    }
    public function cart(){
        return view('pages.client.cart');
    }
    public function check_out(){
        return view('pages.client.checkout');
    }
    public function contact_us(){
        return view('pages.client.contactus');
    }
    public function favorite(){
        return view('pages.client.favorite');
    }
    public function my_account(){
        return view('pages.client.myaccount');
    }
    public function portfolio(){
        $portfolio = DB::select('select * from portfolios where status = ?', [1]);
        return view('pages.client.portfolio')->with('portfolio', $portfolio);
    }
    public function portfolio_detail(){
        return view('pages.client.portfoliodetail');
    }
    public function product(){
        $product = DB::table('products')->where('status',1)->orderBy('id','asc')->get();
        $product_hot = DB::table('products')->where('status',1)->orderBy('price','desc')->limit(5)->get();
        $product_cate = DB::select('select * from product_categories where status = ?', [1]);
        return view('pages.client.productlist')->with('product',$product)
        ->with('product_cate', $product_cate)->with('product_hot',$product_hot);
    }
    public function product_detail($id){
        $list = DB::table('products')->where('status',1)->orderBy('id','desc')->get();
        $product = Product::find($id);
        return view('pages.client.productdetail')->with('product',$product)->with('list',$list);
    }

}
