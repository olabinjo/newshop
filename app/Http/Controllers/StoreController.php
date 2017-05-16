<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate;

use App\Http\Requests;
use Auth;
use App\Store;
use Session;
use App\Product;
use App\Order;



class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $id = Auth::user()->id;
        $user = Auth::user();

        $products = Product::where('user_id', $id)->count();
        $orders = Order::where('store_user_id', $id)->count();
        $revenue = Order::where('store_user_id', $id)->sum('price');
        $storecount = $user->store()->count();

      
        
        $stores = $user->store()->get();


        
        return view('store.index' , compact('stores', 'products', 'orders', 'revenue','storecount'));

     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //create User object to obtain user data
        


        //saving store in database by requesting from form

        $this->validate($request, ['storeName' => 'required|min:5|max:60|unique:stores',]);
        $store = new Store;

        $store->storeName = $request->storeName;
        $store->user_id= $request->storeUserID;
        $store->save();
        
        Session::flash('success', 'Your store has been created');

        return redirect()->view('home');
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
    public function edit($id)
    {
        //
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
}
