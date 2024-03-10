<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\Article;
use App\Models\Services;
use App\Models\TaxEvent;
use Illuminate\Http\Request;
use App\Models\ArticleCategory;

class ArticleController extends Controller
{
     public function index()
    {
        $articleCategories = ArticleCategory::all();
        $articleCarousels = Article::latest()->take(5)->get();
        $taxEvents = TaxEvent::latest()->take(5)->get();
        $articles = Article::latest()->paginate(20);
        $page = Page::findOrFail(5);
        $services = Services::get();
        return view('pages.article',[
            "articleCategories" => $articleCategories,
            "articles" => $articles,
            "articleCarousels" => $articleCarousels,
            "taxEvents" => $taxEvents,
            "page" => $page,
            "services" => $services
        ]);
    }

    public function detail($id)
    {
        $articleCategories = ArticleCategory::all();
        if(app()->getLocale() == "en") {
            $article = Article::where('slug_eng', $id)->with('author')->firstOrFail();
        } else {
            $article = Article::where('slug', $id)->with('author')->firstOrFail();
        }
        $articles = Article::where('id', '!=' ,$article->id)->latest()->take(10)->get();
        $taxEvents = TaxEvent::latest()->take(5)->get();
        
        $relatedArticles = Article::where('article_categories_id', '=' ,$article->article_categories_id)->where('id', '!=' ,$article->id)->latest()->take(5)->get();
        
        $services = Services::get();
        
        return view('pages.articleDetail', [
            "articleCategories" => $articleCategories,
            "article" => $article,
            "relatedArticles" => $relatedArticles,
            "articles" => $articles,
            "taxEvents" => $taxEvents,
            "services" => $services
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

        if(app()->getLocale() == "en") {

            $taxEvent = TaxEvent::where('slug_eng', $id)->firstOrFail();
        } else {
            $taxEvent = TaxEvent::where('slug', $id)->firstOrFail();
        }
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
