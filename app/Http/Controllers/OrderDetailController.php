<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orderDetail = OrderDetail::paginate(10);
        $product = Product::all();
        $order = Order::all();
        return view('pages.server.orderDetaillist')->with('orderDetail', $orderDetail)->with('product', $product)->with('order', $order);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        $order = Order::all();
        return view('pages.server.orderDetailadd')->with('product', $product)->with('order', $order);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $orderDetail = new OrderDetail();
        $orderDetail->id_order = $request->id_order;
        $orderDetail->id_product = $request->id_product;
        $orderDetail->name = $request->name;
        $orderDetail->quantity = $request->quantity;
        $orderDetail->price = $request->price;
        $orderDetail->properties = NULL;
        $orderDetail->save();
        return redirect()->route('orderDetail.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $orderDetail = OrderDetail::find($id);
        $product = Product::all();
        $order = Order::all();
        return view('pages.server.orderDetailshow')->with('orderDetail', $orderDetail)->with('order', $order)->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $orderDetail = OrderDetail::find($id);
        $product = Product::all();
        $order = Order::all();
        return view('pages.server.orderDetailedit')->with('orderDetail', $orderDetail)->with('product', $product)->with('order', $order);
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
        $orderDetail = OrderDetail::find($id);
        $orderDetail->id_order = $request->id_order;
        $orderDetail->id_product = $request->id_product;
        $orderDetail->name = $request->name;
        $orderDetail->quantity = $request->quantity;
        $orderDetail->price = $request->price;
        $orderDetail->properties = NULL;
        $orderDetail->save();
        return redirect()->route('orderDetail.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orderDetail = OrderDetail::find($id);
        $orderDetail->delete();
        return redirect()->route('orderDetail.index');
    }

    public function disabled(Request $request, $id)
    {
        $orderDetail = OrderDetail::find($id);
        $orderDetail->status = 0;
        $orderDetail->save();
        return redirect()->route('orderDetail.index');
    }
    public function enabled(Request $request, $id)
    {
        $orderDetail = OrderDetail::find($id);
        $orderDetail->status = 1 ;
        $orderDetail->save();
        return redirect()->route('orderDetail.index');
    }
}
