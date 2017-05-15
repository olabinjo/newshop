<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;

class SettingsController extends Controller
{
    //

    public function index(){

    	$userID = Auth::user()->id;
    	$users = User::where('id', $userID)->get();


        

        return view('settings.edit', compact('users'));
    }

    public function save(Request $request){


    }
}
