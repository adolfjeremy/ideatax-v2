<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Services::get();
        return view('pages.ourServices',[
            'services' => $services
        ]);
    }

    public function detail(Request $request, $id)
    {
        $services = Services::where('slug', $id)->firstOrFail();
        return view('pages.ourServicesDetail',[
            'services' => $services
        ]);
    }

    public function litigations()
    {
        $services  = Services::take(4)->get();

        return view('pages.taxLitigations',[
            'services' => $services
        ]);
    }
}
