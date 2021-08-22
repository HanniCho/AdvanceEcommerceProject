<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\ShipDivision;
use App\Models\ShipDistrict;
use App\Models\ShipState;

class ShippingAreaController extends Controller
{
    public function DivisionView()
    {
        $divisions = ShipDivision::orderBy('id','DESC')->get();
        return view('admin.shipping.division.division_all',compact('divisions'));
    }
    public function DivisionStore(Request $request)
    {
        $request->validate([
            'division_name'=> 'required',
        ],[
            'division_name.required'=> 'Please input Division Name',
        ]);

        ShipDivision::insert([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now(),
        ]);
        //For toastr message
        $notification = array(
            'message' => 'Division Inserted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function DivisionEdit($id)
    {
        $division = ShipDivision::findOrFail($id);
        return view('admin.shipping.division.division_edit',compact('division'));
    }
    public function DivisionUpdate(Request $request)
    {
        $division_id = $request->id;
        
        ShipDivision::findOrFail($division_id)->update([
            'division_name' => $request->division_name,
            'updated_at' => Carbon::now(),
        ]);
        //For toastr message
        $notification = array(
            'message' => 'Division Updated Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->route('manage.division')->with($notification);            
       
    }
    public function DivisionDelete($id)
    {
        ShipDivision::findOrFail($id)->delete();

        $notification = array(
            'message' => 'Division Deleted Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
    public function DistrictView()
    {
        $divisions = ShipDivision::orderBy('division_name','ASC')->get();
        $districts = ShipDistrict::orderBy('id','DESC')->get();
        return view('admin.shipping.district.district_all',compact('districts','divisions'));
    }
    public function DistrictStore(Request $request)
    {
        $request->validate([
            'division_id'=> 'required',
            'district_name'=> 'required',
        ],[
            'division_id.required'=> 'Please select Division Name',
            'district_name.required'=> 'Please input District Name',
        ]);

        ShipDistrict::insert([
            'division_id' => $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now(),
        ]);
        //For toastr message
        $notification = array(
            'message' => 'District Inserted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function DistrictEdit($id)
    {
        $divisions = ShipDivision::orderBy('division_name','ASC')->get();
        $district = ShipDistrict::findOrFail($id);
        return view('admin.shipping.district.district_edit',compact('district','divisions'));
    }
    public function DistrictUpdate(Request $request)
    {
        $district_id = $request->id;

        ShipDistrict::findOrFail($district_id)->update([
            'division_id' => $request->division_id,            
            'district_name' => $request->district_name,
            'updated_at' => Carbon::now(),
        ]);
        //For toastr message
        $notification = array(
            'message' => 'District Updated Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->route('manage.district')->with($notification);            
       
    }
    public function DistrictDelete($id)
    {
        ShipDistrict::findOrFail($id)->delete();

        $notification = array(
            'message' => 'District Deleted Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
    public function StateView()
    {
        $divisions = ShipDivision::orderBy('division_name','ASC')->get();
        $districts = ShipDistrict::orderBy('district_name','ASC')->get();
        $states = ShipState::with('division','district')->orderBy('id','DESC')->get();
        return view('admin.shipping.state.state_all',compact('districts','divisions','states'));
    }
    public function StateStore(Request $request)
    {
        $request->validate([
            'division_id'=> 'required',
            'district_id'=> 'required',
            'state_name'=> 'required',
        ],[
            'division_id.required'=> 'Please select Division Name',
            'district_id.required'=> 'Please select District Name',
            'district_name.required'=> 'Please input District Name',
        ]);

        ShipState::insert([
            'division_id' => $request->division_id,
            'district_id' => $request->district_id,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now(),
        ]);
        //For toastr message
        $notification = array(
            'message' => 'State Inserted Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function StateEdit($id)
    {
        $divisions = ShipDivision::orderBy('division_name','ASC')->get();
        $districts = ShipDistrict::orderBy('district_name','ASC')->get();
        $state = ShipState::findOrFail($id);
        return view('admin.shipping.state.state_edit',compact('state','districts','divisions'));
    }
    public function StateUpdate(Request $request)
    {
        $state_id = $request->id;

        ShipState::findOrFail($state_id)->update([
            'division_id' => $request->division_id,  
            'district_id' => $request->district_id,           
            'state_name' => $request->state_name,
            'updated_at' => Carbon::now(),
        ]);
        //For toastr message
        $notification = array(
            'message' => 'State Updated Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->route('manage.state')->with($notification);            
       
    }
    public function StateDelete($id)
    {
        ShipState::findOrFail($id)->delete();

        $notification = array(
            'message' => 'State Deleted Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
    public function GetDistrict($division_id)
    {
        $districts = ShipDistrict::where('division_id',$division_id)->orderBy('district_name','ASC')->get();
        return json_encode($districts);
    }
    
}
