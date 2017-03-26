<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Store;



class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

       

        /*$savedStore = Store::where('user_id', '1')->get();

        return View::make('home')->with('savedStores', $savedStore);*/

        //$user = Auth::user();
        
        $user = Auth::user();
        
        $stores = $user->store()->get();
        
        return view('store.index' , compact('stores'));

     
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
        


        //saving task in database by requesting from form

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
