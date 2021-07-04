<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $favorite = Favorite::paginate(10);
        $product = Product::all();
        return view('pages.server.favoritelist')->with('favorite', $favorite)->with('product', $product);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $product = Product::all();
        return view('pages.server.favoriteadd')->with('product', $product);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $favorite = new Favorite();
        $favorite->id_product = $request->id_product;
        $favorite->id_user = $request->id_user;
        $favorite->price = $request->price;
        $favorite->quantity = $request->quantity;
        $favorite->save();
        return redirect()->route('YeuThich.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $favorite = Favorite::find($id);
        $product = Product::all();
        return view('pages.server.favoriteshow')->with('favorite', $favorite)->with('product', $product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::all();
        $favorite = Favorite::find($id);
        return view('pages.server.favoriteedit')->with('favorite', $favorite)->with('product', $product);
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
        $favorite = favorite::find($id);
        $favorite->id_product = $request->id_product;
        $favorite->price = $request->price;
        $favorite->quantity = $request->quantity;
        $favorite->save();
        return redirect()->route('YeuThich.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $favorite = Favorite::find($id);
        $favorite->delete();
        return redirect()->route('YeuThich.index');
    }

    public function disabled(Request $request, $id)
    {
        $favorite = Favorite::find($id);
        $favorite->status = 0;
        $favorite->save();
        return redirect()->route('YeuThich.index');
    }
    public function enabled(Request $request, $id)
    {
        $favorite = Favorite::find($id);
        $favorite->status = 1 ;
        $favorite->save();
        return redirect()->route('YeuThich.index');
    }
}
