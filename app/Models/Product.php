<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{

    protected $table = 'tpl_product';

    protected $primaryKey = 'product_id';

    protected $connection = 'mysql';
    
    
    protected $fillable =[
        'cate_id',
        'user_id',
        'port_id',
        'product_name',
        'product_img',
        'product_img_hover',
        'product_price',
        'product_color',
        'product_description',
        'product_quantity',
        'product_keyword',
        'status',
        'created_at',
        'updated_at',
        'view'
    ];

    public function categories()
    {
        return $this->belongsTo(ProductCategories::class, 'id_cate', 'id');
    }
    public function User(){
        return $this->belongsTo('App\User', 'id_user','id');
    }
    public function portfolio(){
        return $this->belongsTo(Portfolio::class, 'id_portfolio','id');
    }
    public function color(){
        return $this->belongsTo(Color::class, 'id_color','id');
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
