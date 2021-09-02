<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Support\Carbon;
use Auth;

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