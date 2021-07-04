<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $order = Order::paginate(10);
        return view('pages.server.orderlist')->with('order', $order);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.server.orderadd');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $order = new Order();
        $order->name = $request->name;
        $order->email = $request->email;
        $order->fullname = $request->fullname;
        $order->address = $request->address;
        $order->tel = $request->tel;
        $order->gender = $request->gender;
        $order->properties = NULL;
        $order->note = $request->note;
        $order->save();
        return redirect()->route('order.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $order = Order::find($id);return view('pages.server.ordershow')->with('order', $order);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Order::find($id);
        return view('pages.server.orderedit')->with('order', $order);
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
        $order = Order::find($id);
        $order->name = $request->name;
        $order->email = $request->email;
        $order->fullname = $request->fullname;
        $order->address = $request->address;
        $order->tel = $request->tel;
        $order->gender = $request->gender;
        $order->properties = NULL;
        $order->note = $request->note;
        $order->save();
        return redirect()->route('order.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $order = Order::find($id);
        $order->delete();
        return redirect()->route('order.index');
    }

    public function disabled(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = 0;
        $order->save();
        return redirect()->route('order.index');
    }
    public function enabled(Request $request, $id)
    {
        $order = Order::find($id);
        $order->status = 1 ;
        $order->save();
        return redirect()->route('order.index');
    }
}
