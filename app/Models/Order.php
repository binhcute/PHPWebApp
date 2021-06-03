<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $primaryKey = 'id';
    
    protected $connection = 'mysql';
    
    protected $perPage = 10;
    
    protected $fillable = [
        'name',
        'email',
        'fullname',
        'address',
        'tel',
        'gender',
        'properties',
        'status',
        'note'
    ];

    public function OrderDetail(){
        return $this->belongsTo('App\Models\OrderDetail');
    }
}
