<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Productimage;

class ProductImageController extends Controller
{
    //


    public function index()
    {
        $images = Productimage::all();

   return view('images.index', compact('images'));

     
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
         $productImage = new Productimage([
       'image_name'        => $request->get('image_name'),
       'image_extension'   => $request->file('image')->getClientOriginalExtension(),
       'mobile_image_name' => $request->get('mobile_image_name'),
       'mobile_extension'  => $request->file('mobile_image')->getClientOriginalExtension(),
       'is_active'         => $request->get('is_active'),
       'is_featured'       => $request->get('is_featured'),

   ]);

          //define the image paths

   $destinationFolder = '/imgs/product/';
   $destinationThumbnail = '/imgs/product/thumbnails/';
   $destinationMobile = '/imgs/product/mobile/';

   //assign the image paths to new model, so we can save them to DB

   $productImage->image_path = $destinationFolder;
   $productImage->mobile_image_path = $destinationMobile;

   // format checkbox values and save model

   $this->formatCheckboxValue($marketingImage);
   $productImage->save();

   //parts of the image we will need

   $file = Input::file('image');

   $imageName = $productImage->image_name;
   $extension = $request->file('image')->getClientOriginalExtension();

   //create instance of image from temp upload

   $image = Image::make($file->getRealPath());

   //save image with thumbnail

   $image->save(public_path() . $destinationFolder . $imageName . '.' . $extension)
       ->resize(60, 60)
       // ->greyscale()
       ->save(public_path() . $destinationThumbnail . 'thumb-' . $imageName . '.' . $extension);

   // now for mobile

   $mobileFile = Input::file('mobile_image');

   $mobileImageName = $productImage->mobile_image_name;
   $mobileExtension = $request->file('mobile_image')->getClientOriginalExtension();

   //create instance of image from temp upload
   $mobileImage = Image::make($mobileFile->getRealPath());
   $mobileImage->save(public_path() . $destinationMobile . $mobileImageName . '.' . $mobileExtension);


   // Process the uploaded image, add $model->attribute and folder name

   flash()->success('Product Image Created!');

   return redirect()->route('productimage.show', [$productImage]);
       
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
        $productImage = Productimage::findOrFail($id);

        return view('productimage.edit', compact('productImage'));
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
