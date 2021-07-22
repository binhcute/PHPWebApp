<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table = 'tpl_category';

    protected $primaryKey = 'cate_id';

    public $timestamps =true;

    protected $perPage = 10;

    protected $fillable = [
        'user_id',
        'cate_name',
        'cate_img',
        'cate_description',
        'status',
        'created_at',
        'updated_at',
        'view'
    ];

    public function Cate(){
        return DB::table('tpl_category')->where('status',1)->get();
    }

    public function Product(){
        return $this->HasMany(Product::class,'id_cate','id');
    }
    public function User(){
        return $this->belongsTo('App\User', 'id_user','id');
    }
}
