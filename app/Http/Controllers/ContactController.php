<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Http\Request;
use App\Mail\CustomerQuestionMail;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $page = Page::findOrFail(6);
        return view('pages.contact', [
            "page" => $page
        ]);
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
