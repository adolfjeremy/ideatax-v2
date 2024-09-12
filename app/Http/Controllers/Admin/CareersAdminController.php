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
        $careers = Career::get();
        return view('pages.admin.career.index', [
            "careers" => $careers
        ]);
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
        $data['slug_eng'] = Str::slug($request->title_eng);
        $data['slug_jpn'] = Str::slug($request->title_jpn);
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
        $data['slug_eng'] = Str::slug($request->title_eng);
        $data['slug_jpn'] = Str::slug($request->title_jpn);

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
