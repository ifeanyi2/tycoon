<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index()
    {
       return view('admin.categories.index');
    }

    public function store(Request $request)
    {
         $validation = $request->validate([
             'category_name' => 'required|string|unique:categories,category_name|max:255'
         ]);

         // TWO WAYS OF USING ORM
        //  Category::insert([
        //      'category_name' => $request->category_name,
        //      'user_id'       => Auth::user()->id,
        //      'created_at'    => Carbon::now()
        //  ]);

         $category = new Category;
         $category->category_name = $request->category_name;
         $category->user_id       = Auth::user()->id;
         $category->save();

         // Redirect
         return Redirect()->back()->with('success', 'Category added successfully!!');
    }
}
