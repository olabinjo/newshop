<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

class CategoryController extends Controller
{
    //

    public function save(Request $request)
    {
        $category = new Category;
        $category->name = $request->input('category_name');
        $category->store_name = $request->input('store_name');

        $category->save();

        $categories = Category::where('store_name', $request->input('store_name'))->get();

        return view('categories.get', compact('categories'));
    }
}
