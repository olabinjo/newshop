<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use phpDocumentor\Reflection\Types\Object_;
use Response;

use App\Category;
use App\Order;
use App\Product;
use App\Helper;
use App\User;


class WebsiteController extends Controller
{
    //

    public function productList($store_name)
    {
        $products = Product::where('store_name', $store_name)->orderBy('updated_at', 'desc')->paginate(10);
        $categorys = Category::where('store_name', $store_name)->get();
        $store_name = $store_name;

        return view('website.products', compact('store_name', 'products', 'categorys'));
    }

    public function categoryProduct($store_name, $category)
    {
        $products = Product::where('store_name', $store_name)->where('category', '=', $category)->orderBy('updated_at', 'desc')->paginate(10);
        $categorys = Category::where('store_name', $store_name)->get();
        $store_name = $store_name;

        return view('website.category', compact('store_name', 'products', 'categorys'));

    }


    public function viewCart(Request $request)
    {
        // $request->session()->forget('cart');
        $cart = (object)$request->session()->get('cart');
        return view('website.cart', compact('cart'));
    }


    public function addToCart(Request $request)
    {
        $post_product = $request->input('product');

        $cart_session = $request->session()->get('cart');
        if (isset($cart_session)) {
            $cart_session[] = json_decode($post_product);
            session(['cart' => $cart_session]);
        } else {
            $cart_array = array();
            $cart_array[] = json_decode($post_product);
            session(['cart' => $cart_array]);
        }
    }

    public function singleProduct($store_name, $category, $product_id)
    {
        $helper = new Helper();

        $userID = Product::where('store_name', $store_name)->value('user_id');

        $products = Product::where('id', $product_id)->get();
        $store_name = $store_name;
        $relateds = Product::where('category', $category)->where('id', '!=', $product_id)->where('user_id', '=', $userID)->get();
        $categorys = Category::where('store_name', $store_name)->get();
        $images = $helper->get_images_by_id($product_id);

        return view('website.single', compact('products', 'store_name', 'relateds', 'images', 'categorys'));


    }


    public function order(Request $request)
    {
        $cart_session = (object)$request->session()->get('cart');

        foreach ($cart_session as $product) {
            $order = new Order();

            if (Auth::check()) {
             $order->customer_id = Auth::user()->id;
            }else{
                $order->customer_id = 0;
            }

            $order->product_id = $product->id;
            $order->price = $product->price;

            $order->save();

        }

        $request->session()->forget('cart');
    }
}
