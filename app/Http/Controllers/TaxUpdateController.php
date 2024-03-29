<?php

namespace App\Http\Controllers;

use App\Models\Page;
use App\Models\TaxEvent;
use App\Models\TaxUpdate;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\CustomerQuestion;
use App\Models\TaxUpdateCategory;
use App\Http\Requests\CustomerQuestionRequest;

class TaxUpdateController extends Controller
{
    public function index()
    {
        $taxUpdateCategories = TaxUpdateCategory::all();
        $taxUpdateCarousels = TaxUpdate::latest()->take(5)->get();
        $taxUpdates = TaxUpdate::latest()->paginate(20);
        $taxEvents = TaxEvent::latest()->take(5)->get();
        $customerQuestions = CustomerQuestion::where('status', '=', 'ANSWERED')->paginate(20);
        
        $page = Page::findOrFail(4);
        return view('pages.taxUpdate',[
            "taxUpdateCategories" => $taxUpdateCategories,
            "taxUpdateCarousels" => $taxUpdateCarousels,
            "taxUpdates" => $taxUpdates,
            "taxEvents" => $taxEvents,
            "customerQuestions" => $customerQuestions,
            "page" => $page
        ]);
    }

    public function detail($id)
    {
        $taxUpdateCategories = TaxUpdateCategory::all();
        
        if(app()->getLocale() == 'id') {
            $taxUpdate = TaxUpdate::where('slug', $id)->with('user')->firstOrFail();
        } else {
            $taxUpdate = TaxUpdate::where('slug_eng', $id)->with('user')->firstOrFail();
        }
        $relatedUpdates = TaxUpdate::where('tax_update_categories_id', '=' ,$taxUpdate->tax_update_categories_id)->where('id', '!=' ,$taxUpdate->id)->latest()->take(5)->get();
        $taxUpdates = TaxUpdate::where('id', '!=' ,$taxUpdate->id)->latest()->paginate(20);
        $customerQuestions = CustomerQuestion::where('status', '=', 'ANSWERED')->paginate(20);
        $taxEvents = TaxEvent::latest()->take(5)->get();
        return view('pages.taxUpdateDetail',[
            "taxUpdateCategories" => $taxUpdateCategories,
            "taxUpdate" => $taxUpdate,
            "relatedUpdates" => $relatedUpdates,
            "taxUpdates" => $taxUpdates,
            "customerQuestions" => $customerQuestions,
            "taxEvents" => $taxEvents

        ]);
    }

    public function sortByCategory($slug)
    {
        $taxUpdateCategories = TaxUpdateCategory::all();
        $taxUpdateCategory = TaxUpdateCategory::where('slug', $slug)->firstOrFail();
        $taxUpdates = TaxUpdate::where('tax_update_categories_id', $taxUpdateCategory->id)->latest()->paginate(20);
        $taxUpdateCarousels = TaxUpdate::where('tax_update_categories_id', $taxUpdateCategory->id)->latest()->take(5)->get();
        $customerQuestions = CustomerQuestion::where('status', '=', 'ANSWERED')->where('tax_update_categories_id', $taxUpdateCategory->id)->paginate(20);
        $currentCategory = $taxUpdateCategory->title;
        $taxEvents = TaxEvent::latest()->take(5)->get();
        return view('pages.taxUpdateCategory',[
            "taxUpdateCategories" => $taxUpdateCategories,
            "taxUpdateCategory" => $taxUpdateCategory,
            "taxUpdateCarousels" => $taxUpdateCarousels,
            "taxUpdates" => $taxUpdates,
            "customerQuestions" => $customerQuestions,
            "currentCategory" => $currentCategory,
            "taxEvents" => $taxEvents
        ]);
    }

    public function store(CustomerQuestionRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        CustomerQuestion::create($data);

        return redirect()->back();
    }

    public function discussionDetail($id) {

        $taxUpdateCategories = TaxUpdateCategory::all();
        $customerQuestion = CustomerQuestion::where('slug', $id)->firstOrFail();
        $customerQuestions = CustomerQuestion::where('status', '=', 'ANSWERED')->where('id', '!=', $customerQuestion->id)->paginate(20);
        $taxUpdates = TaxUpdate::latest()->paginate(20);
        return view('pages.discussionDetail',[
            "taxUpdateCategories" => $taxUpdateCategories,
            "customerQuestion" => $customerQuestion,
            "customerQuestions" => $customerQuestions,
            "taxUpdates" => $taxUpdates,
        ]);
    }
}
