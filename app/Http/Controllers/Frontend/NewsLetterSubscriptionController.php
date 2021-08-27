<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\NewsLetter;

class NewsLetterSubscriptionController extends Controller
{
    public function NewsLetterStore(Request $request)
    {
        $request->validate([
            'email'=> 'required|unique:news_letters',
        ],[
            'email.required'=> 'Please input your email!',
        ]);

        NewsLetter::insert([
            'email'=> $request->email,
            'created_at' => Carbon::now(),
        ]);
        //For toastr message
        $notification = array(
            'message' => 'Thanks for Subscribing!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
}
