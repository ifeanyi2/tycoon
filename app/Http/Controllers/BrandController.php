<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    public function index()
    {

        $brands = Brand::latest()->paginate('10');
       return view('admin.brands.index', compact('brands'));
    }

    public function create()
    {
         return view('admin.brands.create');
    }

    public function saveBrand(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|max:255|string',
            'type' => 'required|max:255|string',
            'model' => 'required|max:255|string',
            'make' => 'required|max:255|string',
            'fuel' => 'required|max:255|string',
            'engine_size' => 'required|max:255|string',
            'power' => 'required|max:255|string',
            'gearbox' => 'required|max:255|string',
            'number_of_seats' => 'required|max:255|string',
            'doors' => 'required|max:255|string',
            'color' => 'required|max:255|string',
            'price' => 'required|max:255|string',
            'image1' => 'required|mimes:jpg,jpeg,png',
        ]);

        $brand_main_image = $request->file('image1');
        $generate_unique = hexdec(uniqid());
        $image_extension = strtolower($brand_main_image->getClientOriginalExtension());
        $new_image_name = $generate_unique.".".$image_extension;
        $upload_location = "uploads/brands/";
        $for_upload_image = $upload_location.$new_image_name;

        //move the image to a folder
        $brand_main_image->move($upload_location, $new_image_name);

        // $extra_image_one = $request->file('image2');
        // $extra_image_two = $request->file('image3');

        $brand = new Brand();
        $brand->name                        = $request->name;
        $brand->type                        = $request->type;
        $brand->make                        = $request->make;
        $brand->model                       = $request->model;
        $brand->first_registration          = $request->first_registration;
        $brand->mileage                     = $request->mileage;
        $brand->fuel                        = $request->fuel;
        $brand->engine_size                 = $request->engine_size;
        $brand->power                       = $request->power;
        $brand->gearbox                     = $request->gearbox;
        $brand->number_of_seats             = $request->number_of_seats;
        $brand->doors                       = $request->doors;
        $brand->color                       = $request->color;
        $brand->price                       = $request->price;
        $brand->extra                       = $request->extra;
        $brand->description                 = $request->description;
        $brand->image1                      = $for_upload_image;
        $brand->save();
        
        // Redirect
        return Redirect()->route('all.brand')->with('success', 'New Brand Created successfully!!');
    }
}
