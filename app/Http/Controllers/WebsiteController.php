<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Object_;
use Response;

use App\Category;
use App\Product;


class WebsiteController extends Controller
{
    //

    public function productList($store_name)
    {
        $products = Product::where('store_name', $store_name)->get();
        $store_name = $store_name;
        
        return view('website.products', compact('store_name', 'products'));
    }


    public function viewCart(Request $request)
    {
        // $request->session()->forget('cart');
        $cart = (object) $request->session()->get('cart');
        return view('website.cart', compact('cart'));
    }


    public function addToCart(Request $request){
        $post_product = $request->input('product');

        $cart_session = $request->session()->get('cart');
        if(isset($cart_session)){
            $cart_session[] = json_decode($post_product);
            session(['cart' => $cart_session]);
        }else{
            $cart_array = array();
            $cart_array[] = json_decode($post_product);
            session(['cart' => $cart_array]);
        }
    }

    public function singleProduct($store_name, $category, $product_id){

        $products = Product::where('id', $product_id)->get();
        $store_name = $store_name;
        $relateds = Product::where('category', $category)->where('id', '!=' , $product_id)->get();

        return view('website.single', compact('products', 'store_name', 'relateds'));


    }
}
