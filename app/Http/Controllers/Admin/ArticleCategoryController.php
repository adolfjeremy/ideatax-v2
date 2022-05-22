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
        if(request()->ajax())
        {
            $query = ArticleCategory::query(); 
            return Datatables::of($query)
            ->addColumn('action', function($item) {
                 return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="' . route('article-category.edit', $item->id) .'">Edit</a>
                            <form action="' . route('article-category.destroy', $item->id) . '" method="POST">
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
        return view('pages.admin.articleCategory.index');
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
