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
use App\Models\Subscription;
use App\Models\TaxEvent;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $hero = HeroSlider::findOrFail(1);
        $services = Services::all();
        $one = Services::findOrFail(1);
        $two = Services::findOrFail(8);
        $three = Services::findOrFail(11);
        $four = Services::findOrFail(4);
        $articles= Article::latest()->take(4)->get();
        $events= TaxEvent::latest()->take(4)->get();
        $page = Page::findOrFail(1);
        $compro = companyProfile::orderBy('updated_at', 'desc')->first();
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
        ]);
    }

    

    public function store(CompanyProfilerDownloaderRequest $request)
    {
        $data = $request->all();
        
        $compro = companyProfile::orderBy('updated_at', 'desc')->first();
        $path = asset("storage/" . $compro->compro);

        CompanyProfileDonwloaderInfo::create($data);
        
        Session::flush();

        return  redirect()->to($path);
        
    }

    public function subs(Request $request)
    {
        $data = $request->all();
        
        Subscription::create($data);

        return  redirect()->back();
        
    }
    
}

