<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Slider;
use Illuminate\Support\Carbon;
use Image;

class SliderController extends Controller
{
    public function ManageSlider()
    {
        $sliders = Slider::latest()->get();
        return view('admin.slider.slider_all',compact('sliders'));
    }
    public function SliderStore(Request $request)
    {
        $request->validate([
            'slider_image'=> 'required|mimes:jpg,jpeg,png',
        ],[
            'slider_image.required'=> 'Please select an image',
        ]);

        $image = $request->file('slider_image');
        $name_gen =hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
        $save_url = 'upload/slider/'.$name_gen;

        Slider::insert([
            'title' => $request->title,
            'description'=> $request->description,
            'slider_image'=> $save_url,
            'created_at' => Carbon::now(),
        ]);
        //For toastr message
        $notification = array(
            'message' => 'Slider Inserted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function SliderEdit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.slider_edit',compact('slider'));
    }
    public function SliderUpdate(Request $request)
    {
        $slider_id = $request->id;
        $old_image = $request->old_image;
        if ($request->file('slider_image')) {
            unlink($old_image);
            $image = $request->file('slider_image');
            $name_gen =hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
            $save_url = 'upload/slider/'.$name_gen;

            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description'=> $request->description,
                'slider_image'=> $save_url,
                'updated_at' => Carbon::now(),
            ]);
            //For toastr message
            $notification = array(
                'message' => 'Slider Updated Successfully!',
                'alert-type' => 'info'
            );
            return redirect()->route('all.slider')->with($notification);
            
        } else {
            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description'=> $request->description,
                'updated_at' => Carbon::now(),
            ]);
            //For toastr message
            $notification = array(
                'message' => 'Slider Updated Successfully!',
                'alert-type' => 'info'
            );
            return redirect()->route('all.slider')->with($notification);
            
        }
    }
    public function SliderDelete($id)
    {
        $slider = Slider::findOrFail($id);
        $old_image = $slider->slider_image;
        unlink($old_image);

        Slider::findOrFail($id)->delete();

        //For toastr message
        $notification = array(
            'message' => 'Slider Deleted Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
    public function SliderInactive($id)
    {
        Slider::findOrFail($id)->update([
            'status' => 0,
        ]);
        $notification = array(
			'message' => 'Slider Inactive',
			'alert-type' => 'success'
		);

		return redirect()->back()->with($notification);
    }
    public function SliderActive($id)
    {
        Slider::findOrFail($id)->update([
            'status' => 1,
        ]);
        $notification = array(
			'message' => 'Slider Active',
			'alert-type' => 'success'
		);
        return redirect()->back()->with($notification);
    }
}
