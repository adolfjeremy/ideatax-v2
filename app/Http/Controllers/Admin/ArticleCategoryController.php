<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleCategoryRequest;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Str;

class ArticleCategoryController extends Controller
{
    public function index()
    {
        $categories = ArticleCategory::get();

        return view('pages.admin.articleCategory.index', [
            "categories" => $categories
        ]);
    }

    public function create()
    {
        return view('pages.admin.articleCategory.create');
    }

    public function store(ArticleCategoryRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        ArticleCategory::create($data);

        return redirect()->route('article-category.index');
    }

    public function edit($id)
    {
        $item = ArticleCategory::findOrFail($id);

        return view('pages.admin.articleCategory.edit',[
            'item' => $item
        ]);
    }

    public function update(ArticleCategoryRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $item = ArticleCategory::findOrFail($id);
        $item->update($data);

        return redirect()->route('article-category.index');
    }

    public function destroy($id)
    {
        $item = ArticleCategory::findOrFail($id);
        $item->delete();

        return redirect()->route('article-category.index');
    }
}
