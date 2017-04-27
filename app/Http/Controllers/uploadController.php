<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Auth;
use Validator;
use Response;
use Redirect;
use Session;
use App\Upload;
use App\User;


class uploadController extends Controller
{
  public function index(){

  	

  	return view('product.create', compact('images'));
  }

  public function multiple_upload(Request $request)
  {//getting all of the post data



  	$files = Input::file('images');
  	//Making counting of uploaded images
  	$file_count = count($files);
  	$uploadcount = 0;

  	foreach ($files as $file) {
  		$rules = array('file' => 'required');//required|mimes:png, gif, jpeg, txt, pdf
  		$validator = Validator::make(array('file'=>$file),$rules);

  		if($validator->passes()){
  			$destinationPath = 'uploads'; //upload folder in public directory
  			$filename = $file->getClientOriginalName();
  			$upload_success = $file->move($destinationPath, $filename);
  			$uploadcount ++;

  			//save into database
  			$extension = $file->getClientOriginalExtension();
  			$entry = new Upload();
  			$entry->mime = $file->getClientMimeType();
  			$entry->storeUserID = $request->storeUserID;
  			$entry->original_filename= $filename;
  			$entry->filename = $file->getFilename(). '.'.$extension;
  			$entry->save();


  		}
  	}

  	if($uploadcount == $file_count){
  		Session::flash('success', 'Upload successfully');
  		return Redirect::to('upload');
  	} else{
  		return Redirect::to('upload')->withInput()->withErrors($validator);

  	}
  }

}
