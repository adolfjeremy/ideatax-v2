<?php

namespace App\Http\Controllers\Admin;

use App\Models\Career;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CareerRequest;
use Yajra\DataTables\Facades\DataTables;

class CareersAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->ajax())
        {
            $query = Career::query(); 
            return Datatables::of($query)
            ->addColumn('action', function($item) {
                 return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="' . route('career.edit', $item->id) .'">Edit</a>
                            <form action="' . route('career.destroy', $item->id) . '" method="POST">
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
        return view('pages.admin.career.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {

        return view('pages.admin.career.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CareerRequest $request) {
        $data = $request->all();

        $data['slug'] = Str::slug($request->title);
        Career::create($data);

        return redirect()->route('career.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\career  $career
     * @return \Illuminate\Http\Response
     */
    public function show(career $career)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\career  $career
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Career::findOrFail($id);

        return view('pages.admin.career.edit',[
            'item' => $item,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\career  $career
     * @return \Illuminate\Http\Response
     */
    public function update(CareerRequest $request, $id)
    {
        $data = $request->all();

        $item = Career::findOrFail($id);
        
        $data['slug'] = Str::slug($request->title);

        $item->update($data);

        return redirect()->route('career.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\career  $career
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Career::findOrFail($id);
        $item->delete();

        return redirect()->route('career.index');
    }
}
