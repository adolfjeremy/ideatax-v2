<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Services;
use App\Models\Team;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class aboutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('pages.about');
    }

    public function team()
    {
        $teams = Team::orderBy('id')->get();
        $page = Page::findOrFail(2);

        return view('pages.team',[
            "teams" => $teams,
            "page" => $page
        ]);
    }

    public function teamDetail($id)
    {
        $team = Team::where('slug', $id)->firstOrFail();
        $teams = Team::where('id', '!=', $team->id)->orderBy('name')->get();
        $services = Services::get();

        return view('pages.teamDetail',[
            "team" => $team,
            "teams" => $teams,
            "services" => $services
        ]);
    }

}
