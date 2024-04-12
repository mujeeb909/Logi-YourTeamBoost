<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactFormController extends Controller
{
    public function submit(Request $request)
    {
        
        $emailData  = Validator::make($request->all(), [
            'name' => 'required|min:3|max:255',
            'email' => 'required|email',
            'subject' => 'required|email',
            'message' => 'required|min:10',
        ])->validate();

        Mail::to('destination@example.com')->send(new ContactMail( $emailData ));

        return back()->with('success', 'Thank you for your message!');
    }
}
