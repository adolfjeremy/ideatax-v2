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

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Services::all();
        $latestArticles= Article::latest()->take(5)->get();
        $page = Page::findOrFail(1);
        $sliders = HeroSlider::with('service')->get();
        $compro = companyProfile::orderBy('updated_at', 'desc')->first();
        return view('pages.home',[
            "services" => $services,
            'latestArticles' => $latestArticles,
            'page' => $page,
            'sliders' =>$sliders,
            'compro' => $compro
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
}

