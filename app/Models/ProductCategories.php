<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategories extends Model
{
    protected $table = 'product_categories';

    protected $primaryKey = 'id';

    public $timestamps =true;

    protected $perPage = 10;

    protected $fillable = [
        'name',
        'img',
        'detail',
        'keyword',
        'properties',
        'status'
    ];

    public function Product(){
        return $this->HasMany(Product::class,'id_cate','id');
    }
    public function User(){
        return $this->belongsTo('App\User', 'id_user','id');
    }
}
