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
        $categories = TaxUpdateCategory::get();
        return view('pages.admin.taxUpdateCategory.index', [
            "categories" => $categories
        ]);
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
