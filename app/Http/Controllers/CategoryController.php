<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{
    public function index()
    {
        // $category = Category::orderBy('id', 'DESC')->get();
        $category = Category::latest()->paginate(3);

        // fetch category that was soft deleted
        $trashCat = Category::onlyTrashed()->latest()->paginate('3');


       return view('admin.categories.index', compact('category', 'trashCat'));
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

    public function edit($id)
    {
        $category =  Category::find($id);

        return view('admin.categories.edit', compact('category'));
          
    }

    public function update(Request $request,$id)
    {
        $validation = $request->validate([
            'category_name' => 'required|string|max:255'
        ]);

          $update = Category::find($id)->update([
              'category_name' => $request->category_name,
              'user_id'  => Auth::user()->id
          ]);



        return Redirect()->route('all.category')->with('success', 'Category Updated successfully!!');
    }

    public function softDelete($id)
    {
        $delete = Category::find($id)->delete();
        return Redirect()->route('all.category')->with('success', 'Category Moved To Trash Successfully!!');
    }

    // restore soft deleted category
    public function restore($id)
    {
        $restore = Category::withTrashed()->find($id)->restore();
        return Redirect()->route('all.category')->with('success', 'Category Successfully!!');
    }

    // delete category permanently
    public function destroy($id)
    {


       $destroy = Category::onlyTrashed()->find($id)->forceDelete();


        return Redirect()->route('all.category')->with('success', 'Category Deleted Permanently!!');
    }
}
