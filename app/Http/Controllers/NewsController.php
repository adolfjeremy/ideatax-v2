<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\NewsCategory;
use App\Models\TaxEvent;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $newsCategories = NewsCategory::all();
        $newsCarousels = News::latest()->take(5)->get();
        $taxEvents = TaxEvent::latest()->take(5)->get();
        $newses = News::latest()->paginate(20);
        return view('pages.news',[
            "newsCategories" => $newsCategories,
            "newses" => $newses,
            "newsCarousels" => $newsCarousels,
            "taxEvents" => $taxEvents,
        ]);
    }
    public function detail($id)
    {
        $newsCategories = NewsCategory::all();
        $news = News::where('slug', $id)->firstOrFail();
        $relatedNewses = News::where('news_categories_id', '=' ,$news->news_categories_id)->where('id', '!=' ,$news->id)->latest()->take(3)->get();
        $newses = News::where('id', '!=' ,$news->id)->latest()->take(10)->get();
        $taxEvents = TaxEvent::latest()->take(5)->get();
        
        return view('pages.newsDetail', [
            "newsCategories" => $newsCategories,
            "news" => $news,
            "relatedNewses" => $relatedNewses,
            "newses" => $newses,
            "taxEvents" => $taxEvents
        ]);
    }

    public function sortByCategory($slug)
    {
        $newsCategories = NewsCategory::all();
        $newsCategory = NewsCategory::where('slug', $slug)->firstOrFail();
        $newses = News::where('news_categories_id', $newsCategory->id)->latest()->paginate(20);
        $newsCarousels = News::where('news_categories_id', $newsCategory->id)->latest()->take(5)->get();
        $taxEvents = TaxEvent::latest()->take(5)->get();

        return view('pages.news',[
            "newsCategories" => $newsCategories,
            "newses" => $newses,
            "newsCarousels" => $newsCarousels,
            "taxEvents" => $taxEvents,
        ]);
    }
    
    public function taxEvent($id)
    {
        $newsCategories = NewsCategory::all();
        $taxEvent = TaxEvent::where('slug', $id)->firstOrFail();
        $taxEvents = TaxEvent::where('id', '!=', $taxEvent->id)->latest()->take(5)->get();
        $newses = News::latest()->take(10)->get();
        
        return view('pages.taxEvent', [
            "newsCategories" => $newsCategories,
            "taxEvent" => $taxEvent,
            "taxEvents" => $taxEvents,
            "newses" => $newses,
        ]);
    }
}
