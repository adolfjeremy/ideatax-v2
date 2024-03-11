<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\companyProfile;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\CompanyProfileRequest;

class CompanyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $compros = companyProfile::get();
        return view('pages.admin.Compro.index', [
            "compros" => $compros
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.Compro.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyProfileRequest $request)
    {
        $data = $request->all();
        
        if($request->file('compro'))
        {
            $data['compro'] = $request->file('compro')->store('compro');
        }
        
        companyProfile::create($data);

        return redirect()->route('compro.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = companyProfile::findOrFail($id);

        return view('pages.admin.Compro.edit',[
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyProfileRequest $request, $id)
    {
        $data = $request->all();

        $item = CompanyProfile::findOrFail($id);
        
        if($request->file('compro'))
        {
            if($request->oldcompro)
            {
                Storage::delete($request->oldcompro);
            }
            $data['compro'] = $request->file('compro')->store('compro');
        }

        $item->update($data);
        return redirect()->route('compro.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = CompanyProfile::findOrFail($id);
        Storage::delete($item->compro);
        $item->delete();

        return redirect()->route('compro.index');
    }
}
