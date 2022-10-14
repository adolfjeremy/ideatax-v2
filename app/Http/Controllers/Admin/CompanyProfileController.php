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
        if(request()->ajax())
        {
            $query = companyProfile::query(); 
            return Datatables::of($query)
            ->addColumn('action', function($item) {
                 return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="' . route('compro.edit', $item->id) .'">Edit</a>
                            <form action="' . route('compro.destroy', $item->id) . '" method="POST">
                                ' . method_field('delete') . csrf_field() .'
                                <button type="submit" class="dropdown-item text-danger">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                ';
            })
            ->editColumn('updated_at', function ($item) {
                return $item->updated_at;
            })
            ->rawColumns(['action'])
            -> make();
        }
        return view('pages.admin.Compro.index');
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
