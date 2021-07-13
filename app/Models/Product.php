<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    // protected $table = 'tbl_product';

    protected $primaryKey = 'id';

    protected $connection = 'mysql';
    
    protected $perPage = 10;
    
    protected $fillable =[
        'id_cate',
        'id_user',
        'id_portfolio',
        'id_color',
        'name',
        'img',
        'img_hover',
        'slide_img',
        'price',
        'series',
        'detail',
        'quantity',
        'keyword',
        'properties',
        'status',
        'view'
    ];

    public function categories()
    {
        return $this->belongsTo(ProductCategories::class, 'id_cate', 'id');
    }
    public function User(){
        return $this->belongsTo('App\User');
    }
    public function portfolio(){
        return $this->belongsTo(Portfolio::class, 'id_portfolio','id');
    }
    public function OrderDetail(){
        return $this->HasMany('App\Models\OrderDetail','foreign_key','local_key');
    }
    public function Comment(){
        return $this->HasMany('App\Models\Comment','foreign_key','local_key');
    }

    public function getObservableEvents()
    {
        return array_merge(
            [
                'retrieved', 'creating', 'created', 'updating', 'updated',
                'saving', 'saved', 'restoring', 'restored',
                'deleting', 'deleted', 'forceDeleted',
            ],
            $this->observables
        );
    }
}
