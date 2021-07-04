<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ClientController extends Controller
{
    public function index(){
        $product = Product::all();
        return view('pages.client.index')->with('product', $product);
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
        return view('pages.client.portfolio');
    }
    public function portfolio_detail(){
        return view('pages.client.portfoliodetail');
    }
    public function product(){
        return view('pages.client.productlist');
    }
    public function product_detail(){
        return view('pages.client.productdetail');
    }
}
