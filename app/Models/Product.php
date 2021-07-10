<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $primaryKey = 'id';

    protected $connection = 'mysql';
    
    protected $perPage = 10;
    
    protected $fillable =[
        'name',
        'img',
        'slide_img',
        'price',
        'color',
        'detail',
        'quantity',
        'keyword',
        'properties',
        'status',
        'view'
    ];

    public function ProductCategory(){
        return $this->belongsTo('App\Models\ProductCategory');
    }
    public function User(){
        return $this->belongsTo('App\User');
    }
    public function Portfolio(){
        return $this->belongsTo('App\Models\Portfolio');
    }
    public function OrderDetail(){
        return $this->HasMany('App\Models\OrderDetail');
    }
    public function Comment(){
        return $this->HasMany('App\Models\Comment');
    }
}
