<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\ArticleCategory;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $query = Article::query(); 
            return Datatables::of($query)
            ->addColumn('action', function($item) {
                 return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="' . route('articles.edit', $item->id) .'">Edit</a>
                            <form action="' . route('articles.destroy', $item->id) . '" method="POST">
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
            ->editColumn('article_categories_id', function($item) {
                return $item->articleCategory ? $item->articleCategory->title : "";
            })
            ->rawColumns(['action', 'photo', 'article_categories_id'])
            -> make();
        }
        return view('pages.admin.article.index');
    }

    public function create() {
        $articleCategories = ArticleCategory::all();

        return view('pages.admin.article.create', [
            'articleCategories' => $articleCategories
        ]);
    }

    public function store(ArticleRequest $request) {
        $data = $request->all();
        
        $data['user_id'] = Auth::user()->id;

        if($request->file('photo'))
        {
            $data['photo'] = $request->file('photo')->store('article');
        }

        $data['slug'] = Str::slug($request->title);
        Article::create($data);

        return redirect()->route('articles.index');
    }

    public function edit($id)
    {
        $item = Article::findOrFail($id);
        $articleCategories = ArticleCategory::all();

        return view('pages.admin.article.edit',[
            'item' => $item,
            'articleCategories' => $articleCategories,
        ]);
    }

    public function update(ArticleRequest $request, $id)
    {
        $data = $request->all();

        $item = Article::findOrFail($id);

        
        $data['user_id'] = Auth::user()->id;

        if($request->file('photo'))
        {
            if($request->oldImage)
            {
                Storage::delete($request->oldImage);
            }
            $data['photo'] = $request->file('photo')->store('article');
        }
        
        $data['slug'] = Str::slug($request->title);

        $item->update($data);

        return redirect()->route('articles.index');
    }

    public function destroy($id)
    {
        $item = Article::findOrFail($id);
        Storage::delete($item->photo);
        $item->delete();

        return redirect()->route('articles.index');
    }
}
