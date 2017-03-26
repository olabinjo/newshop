<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //

    function store()
    {
        return $this->belongsTo(Store::class);
    }

    function products()
    {
        return $this->hasMany(Product::class);
    }
}
