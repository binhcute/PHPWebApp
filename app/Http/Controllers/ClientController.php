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
}
