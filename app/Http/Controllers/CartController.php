<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Cart;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::content();
        return view('pages.client.cart')
            ->with('cart', $cart);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (Request::isMethod('post')) {
            $product_id = Request::get('product_id');
            $qty = Request::get('qty');
            $product = DB::table('tpl_product')
                ->join('tpl_portfolio', 'tpl_portfolio.port_id', 'tpl_product.port_id')
                ->join('tpl_category', 'tpl_category.cate_id', '=', 'tpl_product.cate_id')
                ->where('tpl_product.product_id','=',$product_id)
                ->first();

            $data['id'] = $product->product_id;
            $data['qty'] = $qty;
            $data['name'] = $product->product_name;
            $data['price'] = $product->product_price;
            $data['weight'] = $product->product_quantity;
            $data['options']['image'] = $product->product_img;

            Cart::add($data);
        }
        if (Request::get('increment')) {
            $rows = Cart::search(function ($key, $value) {
                return $key->id == Request::get('product_id');
            });
            $item = $rows->first();
            Cart::update($item->rowId, $item->qty + 1);
        }

        //decrease the quantity
        if (Request::get('decrease')) {
            $rows = Cart::search(function ($key, $value) {
                return $key->id == Request::get('product_id');
            });
            $item = $rows->first();
            Cart::update($item->rowId, $item->qty - 1);
        }
        $cart = Cart::content();
        $this->data['cart'] = $cart;

        return Redirect::back();
    }

    public function change_qty()
    {
        //increment the quantity
        if (Request::get('increment')) {
            $rows = Cart::search(function ($key, $value) {
                return $key->id == Request::get('product_id');
            });
            $item = $rows->first();
            Cart::update($item->rowId, $item->qty + 1);
        }

        //decrease the quantity
        if (Request::get('decrease')) {
            $rows = Cart::search(function ($key, $value) {
                return $key->id == Request::get('product_id');
            });
            $item = $rows->first();
            Cart::update($item->rowId, $item->qty - 1);
        }

        $cart = Cart::content();
        $this->data['cart'] = $cart;

        return view('layouts.cart', $this->data);
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $rowId = Cart::search(array('id' => Request::get('product_id')));
        Cart::remove($rowId[0]);
    }
}
