<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\ArticleCategory;
use App\Models\TaxEvent;

class ArticleController extends Controller
{
     public function index()
    {
        $articleCategories = ArticleCategory::all();
        $articleCarousels = Article::latest()->take(5)->get();
        $taxEvents = TaxEvent::latest()->take(5)->get();
        $articles = Article::latest()->paginate(20);
        return view('pages.article',[
            "articleCategories" => $articleCategories,
            "articles" => $articles,
            "articleCarousels" => $articleCarousels,
            "taxEvents" => $taxEvents,
        ]);
    }

    public function detail($id)
    {
        $articleCategories = ArticleCategory::all();
        $article = Article::where('slug', $id)->firstOrFail();
        $articles = Article::where('id', '!=' ,$article->id)->latest()->take(10)->get();
        $taxEvents = TaxEvent::latest()->take(5)->get();
        
        $relatedArticles = Article::where('article_categories_id', '=' ,$article->article_categories_id)->where('id', '!=' ,$article->id)->latest()->take(3)->get();
        
        return view('pages.articleDetail', [
            "articleCategories" => $articleCategories,
            "article" => $article,
            "relatedArticles" => $relatedArticles,
            "articles" => $articles,
            "taxEvents" => $taxEvents
        ]);
    }

    public function sortByCategory($slug)
    {
        $articleCategories = ArticleCategory::all();
        $articleCategory = ArticleCategory::where('slug', $slug)->firstOrFail();
        $articles = Article::where('article_categories_id', $articleCategory->id)->latest()->paginate(20);
        $articleCarousels = Article::where('article_categories_id', $articleCategory->id)->latest()->take(5)->get();
        $taxEvents = TaxEvent::latest()->take(5)->get();
        $currentCategory = $articleCategory->title;

        return view('pages.articleCategory',[
            "articleCategories" => $articleCategories,
            "articleCategory" => $articleCategory,
            "articleCarousels" => $articleCarousels,
            "articles" => $articles,
            "taxEvents" => $taxEvents,
            "currentCategory" => $currentCategory,
        ]);
    }

    public function taxEvent($id)
    {
        $articleCategories = ArticleCategory::all();
        $taxEvent = TaxEvent::where('slug', $id)->firstOrFail();
        $taxEvents = TaxEvent::where('id', '!=', $taxEvent->id)->latest()->take(5)->get();
        $articles = Article::latest()->paginate(20);
        
        return view('pages.taxEvent', [
            "articleCategories" => $articleCategories,
            "taxEvent" => $taxEvent,
            "taxEvents" => $taxEvents,
            "articles" => $articles,
        ]);
    }
}
