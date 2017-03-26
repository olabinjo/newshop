<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DraftProduct extends Model
{
    //

    function product()
    {
        return $this->belongsTo(Product::class);
    }
}
