<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\NewsLetter;
use DB;

class NewsLetterController extends Controller
{
    public function DisplayNewsLetter()
    {
        $newsletters = NewsLetter::orderBy('id','DESC')->get();
        return view('admin.newsletter.newsletter_all',compact('newsletters'));
    }
    public function NewsLetterDelete($id)
    {
        NewsLetter::findOrFail($id)->delete();
        $notification = array(
            'message' => 'Subscriber Deleted Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
    public function NewsLetterDeleteAll(Request $request)
    {
        $ids = $request->ids;
        DB::delete('delete from news_letters where id IN ('.implode(',',$ids).')');
        //dd($str);
        //NewsLetter::where('id','IN','('.implode(',',$ids).')')->delete();
        $notification = array(
            'message' => 'Subscriber Deleted Successfully!',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notification);
    }
}
