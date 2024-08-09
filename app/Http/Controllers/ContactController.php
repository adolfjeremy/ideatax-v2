<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Mail\CustomerQuestionMail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\HttpFoundation\IpUtils;

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
        $services = Services::get();
        return view('pages.contact', [
            "page" => $page,
            "services" => $services
        ]);
    }

    public function sendMail(Request $request)
    {   
        $req = $request->all();
        $name = $req["name"];
        $email = $req["email"];
        $phone = $req["phone_number"];
        $custMessage = $req["message"];
        

        $recaptcha_response = $request->input('g-recaptcha-response');

        if (is_null($recaptcha_response)) {
            return redirect()->back()->with('status', 'Please Complete the Recaptcha to proceed');
        }

        $url = "https://www.google.com/recaptcha/api/siteverify";

        $body = [
            'secret' => config('services.recaptcha.secret'),
            'response' => $recaptcha_response,
            'remoteip' => IpUtils::anonymize($request->ip()) //anonymize the ip to be GDPR compliant. Otherwise just pass the default ip address
        ];

        $response = Http::asForm()->post($url, $body);

        $result = json_decode($response);

        if ($response->successful() && $result->success == true) {
            Mail::to("consultant@ideatax.id")->send(new CustomerQuestionMail($name, $email, $phone, $custMessage));
            return redirect()->back()->with([
                'successAlert' => "Message sent"
            ]);
        } else {
            return redirect()->back()->with('status', 'Please Complete the Recaptcha Again to proceed');
        }
    }
}
