<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $primaryKey = 'id';
    
    protected $connection = 'mysql';
    
    protected $perPage = 10;
    
    protected $fillable = [
        'detail',
        'status'
    ];

    public function Product(){
        return $this->belongsTo('App\Models\Product');
    }
    public function User(){
        return $this->belongsTo('App\User');
    }
    public function Article(){
        return $this->belongsTo('App\Models\Article');
    }
}
