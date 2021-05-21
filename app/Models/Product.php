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

    public function ProductCategories(){
        return $this->belongsTo('App\Models\ProductCategories');
    }
}
