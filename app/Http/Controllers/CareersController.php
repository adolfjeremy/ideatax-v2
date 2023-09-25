<?php

namespace App\Http\Controllers;

use App\Models\Career;
use Illuminate\Http\Request;

class CareersController extends Controller
{
    public function index()
    {
        $careers = Career::all();
        return view('pages.careers', [
            'careers' => $careers
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
