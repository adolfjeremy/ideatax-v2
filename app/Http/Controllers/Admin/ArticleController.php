<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ArticleRequest;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\Author;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;

class ArticleController extends Controller
{
    public function index()
    {
        $categories = ArticleCategory::get();
        $search = request()->query('search');
        $categoryFilter = request()->query('category');
        
        if($search) {
            $articles = Article::where('title', 'LIKE', "%{$search}%")->get();
        } else if($categoryFilter) {
            $articles = Article::where('article_categories_id', $categoryFilter)->get();
        } else {
            $articles = Article::get();
        }
        return view('pages.admin.article.index',[
            "categories" => $categories,
            "articles" => $articles
        ]);
    }

    public function create() {
        $articleCategories = ArticleCategory::all();
        $authors = Author::all();

        return view('pages.admin.article.create', [
            'articleCategories' => $articleCategories,
            'authors' => $authors,
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
        $data['slug_eng'] = Str::slug($request->title_eng);
        
        Article::create($data);

        return redirect()->route('articles.index');
    }

    public function edit($id)
    {
        $item = Article::findOrFail($id);
        $authors = Author::all();
        $articleCategories = ArticleCategory::all();

        return view('pages.admin.article.edit',[
            'item' => $item,
            'authors' => $authors,
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
        $data['slug_eng'] = Str::slug($request->title_eng);

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
