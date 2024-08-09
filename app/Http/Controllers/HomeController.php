<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Article;
use App\Models\Services;
use Illuminate\Http\Request;
use App\Models\companyProfile;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use App\Models\CompanyProfileDonwloaderInfo;
use App\Http\Requests\CompanyProfilerDownloaderRequest;
use App\Models\HeroSlider;
use App\Models\Stat;
use App\Models\Subscription;
use App\Models\TaxEvent;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\IpUtils;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hero = HeroSlider::all();
        $services = Services::all();
        $one = Services::findOrFail(1);
        $two = Services::findOrFail(8);
        $three = Services::findOrFail(11);
        $four = Services::findOrFail(4);
        $articles= Article::latest()->take(4)->get();
        $events= TaxEvent::latest()->take(4)->get();
        $page = Page::findOrFail(1);
        $compro = companyProfile::orderBy('updated_at', 'desc')->first();
        $stats = Stat::all();
        return view('pages.home',[
            "hero" => $hero,
            "services" => $services,
            'articles' => $articles,
            'events' => $events,
            'page' => $page,
            'compro' => $compro,
            'one' => $one,
            'two' => $two,
            'three' => $three,
            'four' => $four,
            'stats' => $stats
        ]);
    }

    

    public function store(CompanyProfilerDownloaderRequest $request)
    {
        $data = $request->all();

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
            $compro = companyProfile::orderBy('updated_at', 'desc')->first();
            $path = asset("storage/" . $compro->compro);

            CompanyProfileDonwloaderInfo::create($data);
            
            Session::flush();

        return  redirect()->to($path);
        } else {
            return redirect()->back()->with('status', 'Please Complete the Recaptcha Again to proceed');
        }
        
    }

    public function subs(Request $request)
    {
        $data = $request->all();

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
            Subscription::create($data);

            return  redirect()->back();
        } else {
            return redirect()->back()->with('status', 'Please Complete the Recaptcha Again to proceed');
        }        
    }
    
}

