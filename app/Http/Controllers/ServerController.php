<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\ProductCategories;
use Illuminate\Support\Facades\Auth;

class ServerController extends Controller
{
    public function index(){
        $product = Product::all();
        $product_categories = ProductCategories::all();
        return view('pages.server.index')->with('product', $product)->with('product_categories', $product_categories);
    }
}
