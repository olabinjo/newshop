<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Store extends Model
{
    //

     function user()
    {
        return $this->belongsTo('App\User');
    }

    function products()
    {
        return $this->hasMany(Product::class);
    }
}
