<?php
/**
 * Created by PhpStorm.
 * User: KolawoleBalogun
 * Date: 5/12/17
 * Time: 10:25 AM
 */

namespace App;

use App\Productimage;

class Helper
{
    function get_images_by_id($product_id){
        $productImage = Productimage::where('product_id', $product_id)->get();
        
        return $productImage;
    }
}