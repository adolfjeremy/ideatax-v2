<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\companyProfile;

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
        $compro = companyProfile::orderBy('updated_at', 'desc')->first();
        return view('pages.home',[
            "services" => $services,
            'compro' => $compro
        ]);
    }
}
