<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TeamRequest;
use App\Models\Team;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TeamController extends Controller
{
    public function index()
    {
        $teams = Team::get();
        return view('pages.admin.team.index', [
            "teams" => $teams
        ]);
    }

    public function create()
    {
        return view('pages.admin.team.create');
    }

    public function store(TeamRequest $request)
    {
        $data = $request->all();

        if($request->file('photo'))
        {
            $data['photo'] = $request->file('photo')->store('team');
        }
        if($request->file('profile_picture'))
        {
            $data['profile_picture'] = $request->file('profile_picture')->store('team-pp');
        }

        $data['slug'] = Str::slug($request->name);

        Team::create($data);

        return redirect()->route('team.index');
    }

    public function edit($id)
    {
        $item = Team::findOrFail($id);

        return view('pages.admin.team.edit',[
            'item' => $item,
        ]);
    }

    public function update(TeamRequest $request, $id)
    {
        $data = $request->all();

        $item = Team::findOrFail($id);

        if($request->file('photo'))
        {
            if($request->oldImage)
            {
                Storage::delete($request->oldImage);
            }
            $data['photo'] = $request->file('photo')->store('team');
        }

        if($request->file('profile_picture'))
        {
            if($request->oldPp)
            {
                Storage::delete($request->oldPp);
            }
            $data['profile_picture'] = $request->file('profile_picture')->store('team-pp');
        }
        
        $data['slug'] = Str::slug($request->name);

        $item->update($data);

        return redirect()->route('team.index');
    }

    public function destroy($id)
    {
        $item = Team::findOrFail($id);
        Storage::delete($item->photo);
        $item->delete();

        return redirect()->route('team.index');
    }
}
