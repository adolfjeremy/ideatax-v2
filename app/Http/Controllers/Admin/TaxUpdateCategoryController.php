<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\TaxUpdateCategoryRequest;
use App\Models\TaxUpdateCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class TaxUpdateCategoryController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $query = TaxUpdateCategory::query(); 
            return Datatables::of($query)
            ->addColumn('action', function($item) {
                 return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="' . route('tax-update-category.edit', $item->id) .'">Edit</a>
                            <form action="' . route('tax-update-category.destroy', $item->id) . '" method="POST">
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
        return view('pages.admin.taxUpdateCategory.index');
    }

    public function create()
    {
        return view('pages.admin.taxUpdateCategory.create');
    }

    public function store(TaxUpdateCategoryRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        TaxUpdateCategory::create($data);

        return redirect()->route('tax-update-category.index');
    }

    public function edit($id)
    {
        $item = TaxUpdateCategory::findOrFail($id);

        return view('pages.admin.taxUpdateCategory.edit',[
            'item' => $item
        ]);
    }

    public function update(TaxUpdateCategoryRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $item = TaxUpdateCategory::findOrFail($id);
        $item->update($data);

        return redirect()->route('tax-update-category.index');
    }

    public function destroy($id)
    {
        $item = TaxUpdateCategory::findOrFail($id);
        $item->delete();

        return redirect()->route('tax-update-category.index');
    }
}
