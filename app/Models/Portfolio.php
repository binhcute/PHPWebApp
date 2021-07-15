<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Portfolio extends Model
{
    protected $table = 'portfolios';
    
    protected $primaryKey = 'id';
    
    protected $connection = 'mysql';
    
    protected $perPage = 10;
    
    protected $fillable = [
        'name',
        'img',
        'detail',
        'keywords',
        'properties',
        'status'
    ];

    public function Product(){
        
        return $this->HasMany('App\Models\Product','id','id');
    }
    public function User(){
        return $this->belongsTo('App\User', 'id_user','id');
    }
}
