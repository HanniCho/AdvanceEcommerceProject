<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Seo;
use Illuminate\Support\Carbon;

class SEOController extends Controller
{
    public function SEOEdit()
    {
        $seo = Seo::first();
        return view('admin.seo.seo_edit',compact('seo'));
    }
    public function SEOUpdate(Request $request)
    {
        $seo_id = $request->id;
        
        Seo::findOrFail($seo_id)->update([
            'meta_title' => $request->meta_title,
            'meta_author'=> $request->meta_author,
            'meta_tag'=> $request->meta_tag,
            'description' => $request->description,
            'google_analytics'=> $request->google_analytics,
            'bing_analytics'=> $request->bing_analytics,
            'updated_at' => Carbon::now(),
        ]);
        //For toastr message
        $notification = array(
            'message' => 'SEO Data Updated Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
