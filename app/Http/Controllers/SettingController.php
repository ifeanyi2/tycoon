<?php

namespace App\Http\Controllers;

use App\Models\Settings;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Settings::first();
        
        return view('admin.settings.setting', compact('setting'));
    }

    public function update(Request $request, $id)
    {

        $validation = $request->validate([
            'email' => 'required|email|max:255|min:5',
            'phone' => 'required|max:15|min:11',
            'address' => 'required|max:255|min:5|string',
            'services' => 'required|string|min:10',
            'about'  => 'required|string|min:10',
            'logo'  => 'mimes:jpeg,jpg,png,ico,svg',
            'banner'  => 'mimes:jpeg,jpg,png,ico,svg',
        ]);

        $logo = $request->file('logo');
        $old_logo = $request->old_logo;

        $banner = $request->file('banner');
        $old_banner = $request->old_banner;

         if (!empty($logo)  && !empty($banner)) {
            
        

            // for logo
            $name_gen_logo = hexdec(uniqid()). '.' .$logo->getClientOriginalExtension();
            Image::make($logo)->resize(220, 100)->save('uploads/setting/' . $name_gen_logo, 90);
            $last_img_logo = 'uploads/setting/' . $name_gen_logo;
            unlink($old_logo);

            //for banner
            $name_gen_banner = hexdec(uniqid()).'.'.$banner->getClientOriginalExtension();
            Image::make($banner)->resize(1920, 700)->save('uploads/setting/'.$name_gen_banner);
            $last_img_banner = 'uploads/setting/'.$name_gen_banner;
            unlink($old_banner);

        

            $setting = Settings::find($id)->update([
                'logo' => $last_img_logo,
                'banner' => $last_img_banner,
                'about' => $request->about,
                'services' => $request->services,
                'address' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);

        }else{

            $setting = Settings::find($id)->update([
                'about' => $request->about,
                'services' => $request->services,
                'address' => $request->address,
                'email' => $request->email,
                'phone' => $request->phone,
            ]);

        }
     
       

        return redirect()->back()->with('success', "Settings Updated Successfully!!");


         
    }
}
