<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index() {
        return view('pages.contact');
    }
    public function contact(Request $request) {
        Mail::to('lamyae@wib.co')->send(new ContactMail($request->email,$request->firstName,$request->lastName,$request->options,$request->emailMessage,$request->city,$request->country));
        return response()->json(['message' => 'Email sent successfully'], 200);
    }
}
