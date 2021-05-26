<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $primaryKey = 'id';

    protected $connection = 'mysql';

    protected $fillable =[
        'name',
        'img',
        'price',
        'color',
        'detail',
        'quantity',
        'keyword',
        'properties'
    ];

    // protected $array = [
    //     'Name'=>'name', 'Id_cate'=>'id_cate', 'Gia'=>'price',
    //                                     'Color'=>'color','Detail'=>'detail','Keyword'=>'keyword',
    //                                     'Quantity'=>'quantity','img'=>'img'
    // ];
    public function ProductCategories(){
        return $this->belongsTo('App\Models\ProductCategories');
    }
}
