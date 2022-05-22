<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Services::take(3)->get();
        return view('pages.home',[
            "services" => $services
        ]);
    }
}
