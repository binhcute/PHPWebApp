<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Portfolio;
use App\Models\Article;
use App\Models\ProductCategories;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index(){
        $product_hot = DB::table('products')->where('status',1)->orderBy('price','desc')->limit(4)->get();
        $product_new = DB::table('products')->where('status',1)->orderBy('created_at','desc')->limit(4)->get();
        $product_cate = DB::select('select * from product_categories where status = ?', [1]);
        return view('pages.client.index')
        ->with('product_hot', $product_hot)
        ->with('product_new', $product_new)
        ->with('product_cate', $product_cate);
    }
    public function about_us(){
        return view('pages.client.aboutUs');
    }
    public function article(){
        $article = DB::table('articles')->where('status','1')->orderBy('created_at','desc')->get();
        $product_cate = DB::select('select * from product_categories where status = ?', [1]);
        return view('pages.client.articlelist')
        ->with('article', $article)
        ->with('product_cate', $product_cate);
    }
    public function article_detail($id){
        $article = Article::find($id);
        $article_account = DB::table('users')->select('users.id', 'users.name','users.img')
        ->join('articles','articles.id_user','=','users.id')->where('articles.id',$id)->get();
        return view('pages.client.articledetail')
        ->with('article',$article)
        ->with('article_account', $article_account);
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
    public function portfolio_detail(){
        $portfolio = DB::select('select * from portfolios where status = ?', [1]);
        return view('pages.client.portfoliodetail')->with('portfolio', $portfolio);
    }
    public function categories_detail(){
        $categories = DB::select('select * from product_Categories where status = ?', [1]);
        return view('pages.client.categoriesdetail')->with('categories', $categories);
    }
    public function product(){
        $product = DB::table('products')->where('status',1)->orderBy('id','asc')->get();
        $product_hot = DB::table('products')->where('status',1)->orderBy('price','desc')->limit(6)->get();
        $product_new = DB::table('products')->where('status',1)->orderBy('created_at','desc')->limit(6)->get();
        $product_cate = DB::select('select * from product_categories where status = ?', [1]);
        $portfolio = DB::select('select * from portfolios where status = ?', [1]);
        return view('pages.client.productlist')
        ->with('product',$product)
        ->with('product_cate', $product_cate)
        ->with('product_hot',$product_hot)
        ->with('product_new', $product_new)
        ->with('portfolio', $portfolio);
    }
    public function product_detail($id){

        $list = DB::table('products')->where('status',1)->orderBy('id','desc')->get();
        
        $product_brand = DB::table('portfolios')->select( 'portfolios.name','portfolios.img','portfolios.detail')
        ->join('products','products.id_portfolio','=','portfolios.id')->where('products.id',$id)->get();
        $product_cate = DB::table('product_categories')->select( 'product_categories.name','product_categories.img')
        ->join('products','products.id_cate','=','product_categories.id')->where('products.id',$id)->get();
        $product_color = DB::table('colors')->select( 'colors.name','colors.primary_color')
        ->join('products','products.id_color','=','colors.id')->where('products.id',$id)->get();
        $product = Product::find($id);
        // foreach($product as $key => $value){
        //     $id_cate = $value->id_cate;
        // }
        // $list = DB::table('products')
        // ->join('product_categories','product_categories.id','=','product.id_cate')
        // ->where('product_categories.id',$id_cate)
        // ->whereNotIn('products.id',[$id])
        // ->get();
        return view('pages.client.productdetail')->with('product',$product)
        ->with('list',$list)
        ->with('product_brand', $product_brand)
        ->with('product_cate', $product_cate)
        ->with('product_color', $product_color);
    }

    public function categories_list($id){
        $product_cate = DB::select('select * from product_categories where status = ?', [1]);
        $portfolio = DB::select('select * from portfolios where status = ?', [1]);
        $categories = ProductCategories::find($id);
        $product_by_category = DB::table('products')->select('products.id', 'products.name','products.img','products.img_hover','products.price')
        ->join('product_categories','product_categories.id','=','products.id_cate')->where('product_categories.id',$id)->get();
        return view('pages.client.categorieslist')
        ->with('categories',$categories)
        ->with('portfolio',$portfolio)
        ->with('product_cate', $product_cate)
        ->with('product_by_category',$product_by_category);
    }
    public function portfolio_list($id){
        $product_cate = DB::select('select * from product_categories where status = ?', [1]);
        $portfolio = DB::select('select * from portfolios where status = ?', [1]);
        $port = Portfolio::find($id);
        $product_by_portfolio = DB::table('products')->select('products.id', 'products.name','products.img','products.img_hover','products.price')
        ->join('portfolios','portfolios.id','=','products.id_cate')->where('portfolios.id',$id)->get();
        return view('pages.client.portfoliolist')
        ->with('port',$port)
        ->with('portfolio',$portfolio)
        ->with('product_cate', $product_cate)
        ->with('product_by_portfolio',$product_by_portfolio);
    }
}
