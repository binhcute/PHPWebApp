<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductCategories extends Model
{
    protected $primaryKey = 'id';

    protected $connection = 'mysql';

    protected $fillable = [
        'name',
        'img',
        'detail',
        'keyword',
        'properties',
    ];

    public function Product(){
        return $this->HasMany('App\Models\Product');
    }
}
