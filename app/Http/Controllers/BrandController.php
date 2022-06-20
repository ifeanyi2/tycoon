<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Multipic;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

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
            'number_of_seats' => 'required|max:255|numeric',
            'doors' => 'required|numeric',
            'color' => 'required|max:255|string',
            'price' => 'required|numeric',
            'image1' => 'required|mimes:jpg,jpeg,png',
        ]);

        $brand_main_image = $request->file('image1');
        $name_gen = hexdec(uniqid()).'.'.$brand_main_image->getClientOriginalExtension();
        Image::make($brand_main_image)->resize(500,400)->save('uploads/brands/'.$name_gen, 90);

        $last_img = 'uploads/brands/'.$name_gen;


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
        $brand->price                       = number_format($request->price, 2, ".", ",");
        $brand->extra                       = $request->extra;
        $brand->description                 = $request->description;
        $brand->image1                      = $last_img;
        $brand->save();

        // Redirect
        return Redirect()->route('all.brand')->with('success', 'New Brand Created successfully!!');
    }

    public function editBrand($id){
       $brand = Brand::find($id);
       return view('admin.brands.edit', compact('brand'));
    }

    public function updateBrand(Request $request, $id){
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
            'image1' => 'mimes:jpg,jpeg,png',
        ]);

        // validate possible change of image
        $old_image = $request->old_image;
        $brand_main_image = $request->file('image1');
        


        if ($brand_main_image) {
        
        
            $generate_unique = hexdec(uniqid());
            $image_extension = strtolower($brand_main_image->getClientOriginalExtension());
            $new_image_name = $generate_unique . "." . $image_extension;
            $upload_location = "uploads/brands/";
            $for_upload_image = $upload_location . $new_image_name;

            //move the image to a folder
            $brand_main_image->move($upload_location, $new_image_name);
            unlink($old_image);

            $update_brand = Brand::find($id)->update([
                "name"                        => $request->name,
                "type"                        => $request->type,
                "make"                        => $request->make,
                "model"                       => $request->model,
                "first_registration"          => $request->first_registration,
                "mileage"                     => $request->mileage,
                "fuel"                        => $request->fuel,
                "engine_size"                 => $request->engine_size,
                "power"                       => $request->power,
                "gearbox"                     => $request->gearbox,
                "number_of_seats"             => $request->number_of_seats,
                "doors"                       => $request->doors,
                "color"                       => $request->color,
                "price"                       => $request->price,
                "extra"                       => $request->extra,
                "description"                 => $request->description,
                "image1"                      => $for_upload_image
            ]);

            return Redirect()->route('all.brand')->with('success', 'Brand Updated Successfully!!');

        }else {


            $update_brand = Brand::find($id)->update([
                "name"                        => $request->name,
                "type"                        => $request->type,
                "make"                        => $request->make,
                "model"                       => $request->model,
                "first_registration"          => $request->first_registration,
                "mileage"                     => $request->mileage,
                "fuel"                        => $request->fuel,
                "engine_size"                 => $request->engine_size,
                "power"                       => $request->power,
                "gearbox"                     => $request->gearbox,
                "number_of_seats"             => $request->number_of_seats,
                "doors"                       => $request->doors,
                "color"                       => $request->color,
                "price"                       => $request->price,
                "extra"                       => $request->extra,
                "description"                 => $request->description
            ]);

            return Redirect()->route('all.brand')->with('success', 'Brand Updated Successfully!!');
            
        }

    }

    public function deleteBrand($id){
        $brand = Brand::find($id)->delete();
        return Redirect()->route('all.brand')->with('success', 'Brand moved to archieve!!');
    }

    public function deleteArchieve($id){
        // where we delete permarnetly and remove associated image
    } 


    // ********************** multi image upload section
    public function multiImage()
    {
        $images = Multipic::latest()->paginate('10');
        $brands = Brand::all();

        return view('admin.multi-image.index', compact('images', 'brands'));
    }


    
    public function saveImages(Request $request)
    {
        $validation = $request->validate([
            'brand_id' => 'required',
            'images'   => 'required'
        ]);
        


        $images = $request->file('images');

        foreach($images as $multi_images){


            $name_gen = hexdec(uniqid()) . '.' . $multi_images->getClientOriginalExtension();
            Image::make($multi_images)->resize(300, 300)->save('uploads/multi-images/' . $name_gen, 90);

            $last_img = 'uploads/multi-images/' . $name_gen;

            // Multipic::insert([
            //     'images' => $last_img,
            //     'brand_id' => $request->brand_id
            // ]);

            $multipics = new Multipic();
            $multipics->images    = $last_img;
            $multipics->brand_id  = $request->brand_id;
            $multipics->save();

        }

        return redirect()->route('multi.image')->with('success', 'Images uploaded successfully!');



    }

    public function editImages($id){
        $images = Multipic::find($id);
        $brands = Brand::all();
    

        return view('admin.multi-image.edit', compact('images', 'brands'));
    }

    public function updateImages(Request $request, $id){
        $validation = $request->validate([
            'brand_id' => 'required',
            'images' => 'mimes:jpg,jpeg,png',
        ]);


        $old_image = $request->old_image;
        $brand_main_image = $request->file('images');

        if ($brand_main_image) {


            $generate_unique = hexdec(uniqid());
            $image_extension = strtolower($brand_main_image->getClientOriginalExtension());
            $new_image_name = $generate_unique . "." . $image_extension;
            $upload_location = "uploads/multi-images/";
            $for_upload_image = $upload_location . $new_image_name;

            //move the image to a folder
            $brand_main_image->move($upload_location, $new_image_name);
            unlink($old_image);

            $update_images = Multipic::find($id)->update([
                "brand_id"   => $request->brand_id,
                "images"     => $for_upload_image
            ]);

            return Redirect()->route('multi.image')->with('success', 'Image Updated Successfully!!');


        } else {


            $update_images = Multipic::find($id)->update([
                "brand_id"  => $request->brand_id,
            ]);

            return Redirect()->route('multi.image')->with('success', 'Image Updated Successfully!!');
        }

    }

    public function deleteImages($id){
        $images = Multipic::find($id);
        unlink($images->images);
        $images->delete();
        return Redirect()->route('multi.image')->with('success', 'Image deleted successfully!!');
    }
   
}
