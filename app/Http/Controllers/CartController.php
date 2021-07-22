<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Http\Requests;
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

        $content = Cart::content();
        return view('pages.client.cart')->with('content', $content);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product_id = $request->id;
        $quantity = $request->qty;
        $product_detail = DB::table('tpl_product')
            ->join('tpl_portfolio', 'tpl_portfolio.port_id', 'tpl_product.port_id')
            ->join('tpl_category', 'tpl_category.cate_id', '=', 'tpl_product.cate_id')
            ->where('tpl_product.product_id', $product_id)->first();

        $product_relate = DB::table('tpl_product')
            ->join('tpl_portfolio', 'tpl_portfolio.port_id', 'tpl_product.port_id')
            ->join('tpl_category', 'tpl_category.cate_id', '=', 'tpl_product.cate_id')
            ->where('tpl_product.product_id', $product_id)->get();

        foreach ($product_relate as $key => $value) {

            $cate_id = $value->cate_id;
        }
        $list = DB::table('tpl_product')
            ->join('tpl_category', 'tpl_category.cate_id', '=', 'tpl_product.cate_id')
            ->where('tpl_category.cate_id', $cate_id)
            ->whereNotIn('tpl_product.product_id', [$product_id])
            ->get();

        $data['id'] = $product_detail->product_id;
        $data['qty'] = $quantity;
        $data['name'] = $product_detail->product_name;
        $data['price'] = $product_detail->product_price;
        $data['weight'] = $product_detail->product_quantity;
        $data['options']['image'] = $product_detail->product_img;

        Cart::add($data);
        // cart::destroy();     

        $content = Cart::content();
        return view('pages.client.productdetail')
            ->with('content', $content)
            ->with('product_detail', $product_detail)
            ->with('list', $list);
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
        Cart::remove($id);
        return redirect()->route('cart.index');
    }
}
