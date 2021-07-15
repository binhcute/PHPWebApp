<?php

namespace App\Http\Controllers\Api;

use App\Models\ProductCategories;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductCategories as ProductCategoriesResource;

class ProductCategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategories = ProductCategories::all();
        return ProductCategoriesResource::collection($productCategories);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $productCategories = ProductCategories::create($request->all());
        return new ProductCategoriesResource($productCategories);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProductCategories  $productCategories
     * @return \Illuminate\Http\Response
     */
    public function show(ProductCategories $productCategories)
    {
        return new ProductCategoriesResource($productCategories);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProductCategories  $productCategories
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategories $productCategories)
    {
        return $productCategories->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProductCategories  $productCategories
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductCategories $productCategories)
    {
        $productCategories->delete();
    }
}
