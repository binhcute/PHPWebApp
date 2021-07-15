<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    public function User(){
        return $this->belongsTo('App\User','id_user','id');
    }
}
