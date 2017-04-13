<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use App\ProductImage;

class CreateImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [

             'image_name' => 'alpha_num | required | unique:productimages',
           'mobile_image_name' => 'alpha_num | required | unique:productimages',
           'is_active' => 'boolean',
           'is_featured' => 'boolean',
           'image' => 'required | mimes:jpeg,jpg,bmp,png | max:1000',
           'mobile_image' => 'required | mimes:jpeg,jpg,bmp,png | max:1000'
        ];
    }
}
