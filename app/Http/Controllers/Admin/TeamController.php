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
        if(request()->ajax())
        {
            $query = Team::query(); 
            return Datatables::of($query)
            ->addColumn('action', function($item) {
                 return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="' . route('team.edit', $item->id) .'">Edit</a>
                            <form action="' . route('team.destroy', $item->id) . '" method="POST">
                                ' . method_field('delete') . csrf_field() .'
                                <button type="submit" class="dropdown-item text-danger">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                ';
            })
            ->rawColumns(['action'])
            -> make();
        }
        return view('pages.admin.team.index');
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
