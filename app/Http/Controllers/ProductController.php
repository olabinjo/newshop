<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate;

use App\Http\Requests;
use Auth;
use App\Store;
use Session;
use App\Product;

class ProductController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($storeName)
    {

    	
        
      
        $products = Product::where('store_name', $storeName)->get();

       



        $store_name = $storeName;
        
        return view('store.products' , compact('products', 'store_name'));

     
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

        return view('product.create', compact('store_name'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        


        
        //saving product in database by requesting from form

      $this->validate($request, ['product_name' => 'required|min:3|max:100|', 'category' => 'required|min:5|max:60', 'description' => 'required|min:5|max:10000', 'price' => 'required|min:1|max:100', 'amount'=>'required|min:1|max:20']);
        $product = new Product;

        //create new store
        

        $product->product_name = $request->product_name;
        $product->store_name = $request->store_name;
        $storeName=$request->store_name;
        $product->description = $request->description;
        $product->category = $request->category;
        $product->user_id= Auth::user()->id;

        if($request->submit == 'draft')
        {
        	$product->status = 'draft';
        }

        elseif ($request->submit == 'publish')
        {
        	$product->status = 'published';
        }

   /*switch($request->submit) {

    case 'draft': 
        
    break;

    case 'publish': 
        $product->status = 'published';
    break;
}*/


        
        $product->price = $request->price;
        $product->amount = $request->amount;
        $product->save();
        
        Session::flash('success', 'Your store has been created');

        return route('/products'.'/'.'{$storeName}');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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
