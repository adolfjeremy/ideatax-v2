<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Requests\NewsCategoryRequest;
use Yajra\DataTables\Facades\DataTables;

class NewsCategoryController extends Controller
{
    public function index()
    {
        $categories = NewsCategory::get();
        return view('pages.admin.newsCategory.index', [
            "categories" => $categories
        ]);
    }

    public function create()
    {
        return view('pages.admin.newsCategory.create');
    }

    public function store(NewsCategoryRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        NewsCategory::create($data);

        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $item = NewsCategory::findOrFail($id);

        return view('pages.admin.newsCategory.edit',[
            'item' => $item
        ]);
    }

    public function update(NewsCategoryRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $item = NewsCategory::findOrFail($id);
        $item->update($data);

        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $item = NewsCategory::findOrFail($id);
        $item->delete();

        return redirect()->route('category.index');
    }
}
