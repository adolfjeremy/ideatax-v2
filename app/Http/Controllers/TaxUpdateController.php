<?php

namespace App\Http\Controllers;

use App\Http\Requests\CustomerQuestionRequest;
use App\Models\CustomerQuestion;
use App\Models\TaxUpdate;
use App\Models\TaxUpdateCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TaxUpdateController extends Controller
{
    public function index()
    {
        $taxUpdateCategories = TaxUpdateCategory::all();
        $taxUpdateCarousels = TaxUpdate::latest()->take(5)->get();
        $taxUpdates = TaxUpdate::latest()->paginate(20);
        $customerQuestions = CustomerQuestion::where('status', '=', 'ANSWERED')->paginate(20);
        return view('pages.taxUpdate',[
            "taxUpdateCategories" => $taxUpdateCategories,
            "taxUpdateCarousels" => $taxUpdateCarousels,
            "taxUpdates" => $taxUpdates,
            "customerQuestions" => $customerQuestions,
        ]);
    }

    public function detail($id)
    {
        $taxUpdateCategories = TaxUpdateCategory::all();
        $taxUpdate = TaxUpdate::where('slug', $id)->with('user')->firstOrFail();
        $relatedUpdates = TaxUpdate::where('tax_update_categories_id', '=' ,$taxUpdate->tax_update_categories_id)->where('id', '!=' ,$taxUpdate->id)->latest()->take(5)->get();
        $taxUpdates = TaxUpdate::where('id', '!=' ,$taxUpdate->id)->latest()->paginate(20);
        $customerQuestions = CustomerQuestion::where('status', '=', 'ANSWERED')->paginate(20);
        return view('pages.taxUpdateDetail',[
            "taxUpdateCategories" => $taxUpdateCategories,
            "taxUpdate" => $taxUpdate,
            "relatedUpdates" => $relatedUpdates,
            "taxUpdates" => $taxUpdates,
            "customerQuestions" => $customerQuestions,

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
        return view('pages.taxUpdateCategory',[
            "taxUpdateCategories" => $taxUpdateCategories,
            "taxUpdateCategory" => $taxUpdateCategory,
            "taxUpdateCarousels" => $taxUpdateCarousels,
            "taxUpdates" => $taxUpdates,
            "customerQuestions" => $customerQuestions,
            "currentCategory" => $currentCategory
        ]);
    }

    public function store(CustomerQuestionRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->name);
        CustomerQuestion::create($data);

        return redirect()->route('update');
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
