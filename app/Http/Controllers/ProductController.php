<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate;

use App\Http\Requests;
use Auth;
use App\Category;
use Session;
use App\Product;
use App\Upload;
use App\Productimage;
use Redirect;
use View;
use DB;

class ProductController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($store_name)
    {


        $products = Product::where('store_name', $store_name)->get();


        $store_name = $store_name;

        return view('store.products', compact('products', 'store_name'));


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($store_name)
    {
        //

        $store_name = $store_name;

        $userID = Auth::user()->id;


        $images = Upload::where('storeUserID', $userID)->get();

        $categories = Category::where('store_name', $store_name)->get();

        return view('product.create', compact('store_name', 'images', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {


        //saving product in database by requesting from form

        $this->validate($request, ['product_name' => 'required|min:3|max:100|', 'category' => 'required|min:5|max:60', 'description' => 'required|min:5|max:10000', 'price' => 'required|min:1|max:100', 'amount' => 'required|min:1|max:20']);
        $product = new Product;

        $product->product_name = $request->input('product_name');
        $product->store_name = $request->input('store_name');
        $product->description = $request->input('description');
        $product->amount = $request->input('amount');
        $product->price = $request->input('price');
        $product->category = $request->input('category');
        $product->user_id = Auth::user()->id;


        /*$product->product_name = $request->product_name;
        $product->store_name = $request->store_name;
        $store_name=$request->store_name;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->user_id= Auth::user()->id;*/

        if ($request->submit == 'draft') {
            $product->status = 'draft';
        } elseif ($request->submit == 'publish') {
            $product->status = 'published';
        }


        $product->save();

        if($request->input('product_images') != "") {
            $id_arr = explode(",", $request->input('product_images'));

            foreach ($id_arr as $id) {
                $upload = Upload::where('id', $id)->first();
                if($upload) {
                    $images = new Productimage;
                    $images->filename = $upload->filename;
                    $images->product_id = $product->id;
                    $images->original_filename = $upload->original_filename;
                    $images->save();
                }
            }
        }

        // Session::flash('success', 'Your product has been added to the store');
        echo('Your product has been added to the store');

        //return redirect()->route('store_name', $store_name);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id, $store_name)
    {
        //


        $product = Product::find($id);
        $store_name = $store_name;

        return view('product.edit', compact('product', 'store_name'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function draft(Request $request)
    {


        //saving product in database by requesting from form

        /* $this->validate($request, ['product_name' => 'required|min:3|max:100|', 'category' => 'required|min:5|max:60', 'description' => 'required|min:5|max:10000', 'price' => 'required|min:1|max:100', 'amount'=>'required|min:1|max:20']);
           $product = new Product;

           //create new store


           $product->product_name = $request->product_name;
           $product->store_name = Store::store()->storeName;
           $product->description = $request->description;
           $product->category = $request->category;
           $product->user_id= Auth::user()->id;

   if(Input::get('submit') == 'draft') {
              $product->status = 'draft';
           } elseif(Input::get('submit') == 'publish') {
              $product->status = 'published';
           }



           $product->price = $request->price;
           $product->amount = $request->amount;
           $product->save();

           Session::flash('success', 'Your store has been created');

           return view('store.index');*/
    }
}
