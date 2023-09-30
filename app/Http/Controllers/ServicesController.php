<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Services;
use Illuminate\Http\Request;

class ServicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services = Services::orderBy('id', 'ASC')->get();
        $page = Page::findOrFail(3);
        return view('pages.ourServices',[
            'services' => $services,
            'page' => $page
        ]);
    }
}
