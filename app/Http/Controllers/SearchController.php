<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use App\Models\TaxEvent;
use App\Models\TaxUpdate;

class SearchController extends Controller
{
    public function index() {
        
        $search = request()->query('query');
        $articles = Article::where('title', 'LIKE', "%{$search}%")->paginate(20)->withQueryString();
        $taxEvents = TaxEvent::where('title', 'LIKE', "%{$search}%")->paginate(20)->withQueryString();
        $taxUpdates = TaxUpdate::where('title', 'LIKE', "%{$search}%")->paginate(20)->withQueryString();
        // dd($taxUpdates);
        return View('pages.search-result',[
            "articles" => $articles,
            "taxEvents" => $taxEvents,
            "taxUpdates" => $taxUpdates,
            "search" => $search
        ]);
    }
}
