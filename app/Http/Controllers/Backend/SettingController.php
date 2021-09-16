<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Carbon;
use Auth;
use Image;

class SettingController extends Controller
{
    public function SiteSetting()
    {
       $setting = Setting::first();
       return view('admin.setting.site_setting',compact('setting'));
    }
    public function UpdateSiteSetting(Request $request)
    {        
        $setting_id = $request->id;        
        $old_image = $request->old_image;
        if ($request->file('site_logo')) {
            unlink($old_image);
            $image = $request->file('site_logo');
            $name_gen = ('logo').'.'.$image->getClientOriginalExtension();
            Image::make($image)->save('upload/'.$name_gen);
            $save_url = 'upload/'.$name_gen;

           Setting::findOrFail($setting_id)->update([
                    'site_logo'=> $save_url,
                    'site_name' => $request->site_name,
                    'email'=> $request->email,
                    'mobile'=> $request->mobile,
                    'phone'=> $request->phone,
                    'facebook'=> $request->facebook,
                    'youtube'=> $request->youtube,
                    'twitter'=> $request->twitter,
                    'linkedin'=> $request->linkedin,
                    'instagram'=> $request->instagram,
                    'updated_at' => Carbon::now(),
              
            ]);
            //For toastr message
            $notification = array(
                'message' => 'Setting Updated Successfully!',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);  
                
        } else {
            Setting::findOrFail($setting_id)->update([
                'site_name' => $request->site_name,
                'email'=> $request->email,
                'mobile'=> $request->mobile,
                'phone'=> $request->phone,
                'facebook'=> $request->facebook,
                'youtube'=> $request->youtube,
                'twitter'=> $request->twitter,
                'linkedin'=> $request->linkedin,
                'instagram'=> $request->instagram,
                'updated_at' => Carbon::now(),
            ]);
            //For toastr message
            $notification = array(
                'message' => 'Setting Updated Successfully!',
                'alert-type' => 'info'
            );
            return redirect()->back()->with($notification);   
            
        }    
    }
}