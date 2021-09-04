<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use App\Models\Contact;

class ContactController extends Controller
{
    public function ContactView()
    {
        return view('frontend.contact.contact_view');
    }
    public function ContactStore(Request $request)
    {
        $request->validate([
            'name'=> 'required',
            'email'=> 'required',
            'message_title'=> 'required',
            'message'=> 'required',

        ],[
            'name.required'=> 'Please input Your Name',
            'email.required'=> 'Please input Your Email',
            'message_title.required'=> 'Please input Message Title',
            'message.required'=> 'Please input Message',

        ]);

        Contact::insert([
            'name' => $request->name,
            'email'=> $request->email,
            'message_title'=> $request->message_title,
            'message'=> $request->message,
            'created_at' => Carbon::now(),
        ]);
        //For toastr message
        $notification = array(
            'message' => 'Your Message Sent Successfully!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);
    }
    public function DisplayAllMessages()
    {
        $messages = Contact::orderBy('id','DESC')->get();
        return view('admin.contactmessage.all_contactmessage',compact('messages'));
    }
}
