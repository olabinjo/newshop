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
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {


    }

    public function multiple_upload(Request $request)
    {//getting all of the post data


        $files = Input::file('images');
        //Making counting of uploaded images
        $file_count = count($files);
        $uploadcount = 0;

        foreach ($files as $file) {
            $rules = array('file' => 'required');//required|mimes:png, gif, jpeg, txt, pdf
            $validator = Validator::make(array('file' => $file), $rules);

            if ($validator->passes()) {
                $destinationPath = 'uploads'; //upload folder in public directory
                $filename = $file->getClientOriginalName();
                $upload_success = $file->move($destinationPath, $filename);
                $uploadcount++;

                //pull required data from Product form to return to page

                $product_name = $request->product_name;

                //save into database
                $extension = $file->getClientOriginalExtension();
                $entry = new Upload();
                $store_name = $request->store_name;


                $entry->mime = $file->getClientMimeType();
                $entry->storeUserID = $request->storeUserID;
                $entry->original_filename = $filename;
                $entry->filename = $file->getFilename() . '.' . $extension;
                $entry->save();
            }
        }

        if ($uploadcount == $file_count) {
            Session::flash('success', 'Upload successful');

            $userID = Auth::user()->id;
            $images = Upload::where('storeUserID', $userID)->get();
            return view('upload.doneuploading', compact('images'));
            
            return Redirect::back()->with('product_name'); //popup image modal box after successful upload
        } else {
            Session::flash('fail', 'Image could not be uploaded. Try again');
            return Redirect::to('/' . '{$store_name}' . '/creating')->withInput()->withErrors($validator);

        }
    }

}

/*Pass form data to this upload controller and return it into the view*/
