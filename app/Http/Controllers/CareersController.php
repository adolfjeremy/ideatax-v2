<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Career;
use Illuminate\Http\Request;

class CareersController extends Controller
{
    public function index()
    {
        $careers = Career::all();
        $page = Page::findOrFail(8);
        return view('pages.careers', [
            'careers' => $careers,
            'page' => $page
        ]);
    }

    public function show($id)
    {
        $career = Career::where('slug', $id)->firstOrFail();
        return view('pages.careerDetail', [
            'career' => $career
        ]);
    }
}
