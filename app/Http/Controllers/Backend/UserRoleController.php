<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Carbon;
use Auth;
use Illuminate\Support\Facades\Hash; 


class UserRoleController extends Controller
{
    public function AllAdmin()
    {
        $admins = Admin::where('admin_type',2)->orderBy('name','ASC')->get();
        return view('admin.userrole.all_admin',compact('admins'));
    }
    public function AddAdmin()
    {
       return view('admin.userrole.add_admin');
    }
    public function AdminStore(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'email'=> 'required|unique:admins',
            'phone'=> 'required',
            'password'=> 'required',
        ],[
            'name.required'=> 'Please input Name',
            'email.required'=> 'Please input Email',
            'phone.required'=> 'Please input Phone',
            'password.required'=> 'Please input Password',
        ]);

        Admin::insert([
            'name' => $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'password' => Hash::make($request->password),
            'allow_brand' => $request->allow_brand,
            'allow_category' => $request->allow_category,
            'allow_product' => $request->allow_product,
            'admin_type' => 2,
            'created_at' => Carbon::now(),
        ]);
        //For toastr message
        $notification = array(
            'message' => 'Admin Added Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->route('all.admin')->with($notification);
    }
    public function AdminEdit($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.userrole.edit_admin',compact('admin'));
    }
    public function AdminUpdate(Request $request)
    {
        $admin_id = $request->id;
        $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'phone'=> 'required',
        ],[
            'name.required'=> 'Please input Name',
            'email.required'=> 'Please input Email',
            'phone.required'=> 'Please input Phone',
        ]);
        
        Admin::findOrFail($admin_id)->update([
            'name' => $request->name,
            'email'=> $request->email,
            'phone'=> $request->phone,
            'allow_brand' => $request->allow_brand,
            'allow_category' => $request->allow_category,
            'allow_product' => $request->allow_product,
            'updated_at' => Carbon::now(),
        ]);
        //For toastr message
        $notification = array(
            'message' => 'Admin Updated Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->route('all.admin')->with($notification);            
       
    }
    public function AdminDelete($id)
    {
        Admin::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Admin Deleted Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
