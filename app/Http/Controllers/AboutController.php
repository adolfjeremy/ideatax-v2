<?php

namespace App\Http\Controllers;

use App\Models\Team;
use Illuminate\Http\Request;

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
        $teams = Team::orderBy('name')->get();

        return view('pages.team',[
            "teams" => $teams,
        ]);
    }

    public function teamDetail($id)
    {
        $team = Team::where('slug', $id)->firstOrFail();
        $teams = Team::where('id', '!=', $team->id)->orderBy('name')->get();

        return view('pages.teamDetail',[
            "team" => $team,
            "teams" => $teams,
        ]);
    }
}
