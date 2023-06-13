<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaxUpdate;
use App\Http\Requests\TaxUpdateRequest;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use App\Models\TaxUpdateCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TaxUpdateController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $query = TaxUpdate::query(); 
            return Datatables::of($query)
            ->addColumn('action', function($item) {
                 return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="' . route('update.edit', $item->id) .'">Edit</a>
                            <form action="' . route('update.destroy', $item->id) . '" method="POST">
                                ' . method_field('delete') . csrf_field() .'
                                <button type="submit" class="dropdown-item text-danger">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                ';
            })
            ->editColumn('photo', function($item) {
                return $item->photo ? '<img src ="'. asset("storage/" . $item->photo) .'" style="max-height:80px; border-radius: 0;"/>' : "";
            })
            
            ->editColumn('tax_update_categories_id', function($item) {
                return $item->TaxUpdateCategory ? $item->TaxUpdateCategory->title : "";
            })
            ->rawColumns(['action', 'photo', 'tax_update_categories_id'])
            -> make();
        }
        return view('pages.admin.taxUpdate.index');
    }

    public function create()
    {
        $taxUpdateCategories = TaxUpdateCategory::all();

        return view('pages.admin.taxUpdate.create',[
            "taxUpdateCategories" => $taxUpdateCategories
        ]);
    }

    public function store(TaxUpdateRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        
        if($request->file('photo'))
        {
            $data['photo'] = $request->file('photo')->store('update');
        }

        if($request->file('pdf'))
        {
            $data['pdf'] = $request->file('pdf')->store('update/pdf');
        }

        $data['slug'] = Str::slug($request->title);
        
        TaxUpdate::create($data);

        return redirect()->route('update.index');
    }

    public function edit($id)
    {
        $item = TaxUpdate::findOrFail($id);
        $taxUpdateCategories = TaxUpdateCategory::all();

        return view('pages.admin.taxUpdate.edit',[
            "item" => $item,
            "taxUpdateCategories" => $taxUpdateCategories,

        ]);
    }

    public function update(TaxUpdateRequest $request, $id)
    {
        $data = $request->all();

        $item = TaxUpdate::findOrFail($id);
        
        $data['user_id'] = Auth::user()->id;
        
        if($request->file('photo'))
        {
            if($request->oldImage)
            {
                Storage::delete($request->oldImage);
            }
            $data['photo'] = $request->file('photo')->store('update');
        }

        if($request->file('pdf'))
        {
            if($request->oldFile)
            {
                Storage::delete($request->oldFile);
            }
            $data['pdf'] = $request->file('pdf')->store('update/pdf');
        }

        $data['slug'] = Str::slug($request->title);
        $item->update($data);
        return redirect()->route('update.index');
    }

    public function destroy($id)
    {
        $item = TaxUpdate::findOrFail($id);
        Storage::delete($item->photo);
        Storage::delete($item->pdf);
        $item->delete();

        return redirect()->route('update.index');
    }
}
