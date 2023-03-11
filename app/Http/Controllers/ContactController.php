<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\CustomerQuestionMail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.contact');
    }

    public function sendMail(Request $request)
    {   
        $req = $request->all();
        $name = $req["name"];
        $email = $req["email"];
        $phone = $req["phone_number"];
        $custMessage = $req["message"];
        Mail::to("consultant@ideatax.id")->send(new CustomerQuestionMail($name, $email, $phone, $custMessage));
        return redirect()->back()->with([
            'successAlert' => "Message sent"
        ]);
    }
}
