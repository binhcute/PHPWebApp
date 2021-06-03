<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderDetail extends Model
{
    protected $primaryKey = 'id';
    
    protected $connection = 'mysql';

    protected $fillable = [
        'name',
        'quantity',
        'price'
    ];

    public function Order(){
        return $this->belongsTo('App\Models\Order');
    }
    public function Product(){
        return $this->HasMany('App\Models\Product');
    }
}
