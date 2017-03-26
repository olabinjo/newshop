<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //

    function store()
    {
        return $this->belongsTo(Store::class);
    }

    function orders()
    {
        return $this->hasMany(Order::class);
    }

    function draftproduct()
    {
        return $this->hasMany(DraftProduct::class);

        function category()
    {
        return $this->hasMany(Category::class);
    }
    }
}
