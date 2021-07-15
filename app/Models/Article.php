<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    //Khóa chính tự động tăng int
    protected $primaryKey = 'id';

    //Kết nối CSDL
    protected $connection = 'mysql';
    
    protected $perPage = 10;
    
    protected $fillable = [
        'name',
        'img',
        'detail',
        'keywords',
        'properties',
        'status',
        'view'
    ];
    public function User(){
        return $this->belongsTo('App\User','id_user','id');
    }
    public function Comment(){
        return $this->hasMany('App\Models\Comment');
    }
}
