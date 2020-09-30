<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactsController extends Controller
{
    public function create()
    {
        return view('contact.create');
    }

    public function store(Request  $request)
    {
        $data = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
        ]);
        // Send email
        Mail::to('test@test.com')->send(new ContactMail($request));

        return redirect('contact')->with('message', 'Thanks for the message. We will be in touch');
    }
}
