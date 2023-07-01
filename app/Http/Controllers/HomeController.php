<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\companyProfile;
use App\Models\Page;

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
        $page = Page::findOrFail(1);
        $compro = companyProfile::orderBy('updated_at', 'desc')->first();
        return view('pages.home',[
            "services" => $services,
            'page' => $page,
            'compro' => $compro
        ]);
    }
}
