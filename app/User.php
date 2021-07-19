<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'img',
        'gender',
        'tel',
        'address',
        'email',
        'password',
        'username',
        'level',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function Product(){
        return $this->HasMany('App\Models\Product','id_user','id');
    }
    public function Article(){
        return $this->HasMany('App\Models\Article','id_user','id');
    }
    public function Comment(){
        return $this->HasMany('App\Models\Comment','id_user','id');
    }
}
