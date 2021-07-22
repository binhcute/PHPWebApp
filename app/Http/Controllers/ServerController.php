<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class ServerController extends Controller
{
    public function index(){
        $product = Product::all();
        $category = Category::all();
        return view('pages.server.index')->with('product', $product)->with('category', $category);
    }
}
