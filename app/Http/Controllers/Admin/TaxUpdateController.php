<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\TaxUpdate;
use App\Http\Requests\TaxUpdateRequest;
use Illuminate\Support\Str;
use Yajra\DataTables\Facades\DataTables;
use App\Models\TaxUpdateCategory;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TaxUpdateController extends Controller
{
    public function index()
    {
        $search = request()->query('search');
        $categoryFilter = request()->query('category');
        $categories = TaxUpdateCategory::get();

        if($search) {
            $updates = TaxUpdate::where('title', 'LIKE', "%{$search}%")->get();
        } else if ($categoryFilter) {
            $updates = TaxUpdate::where('tax_update_categories_id', $categoryFilter)->get();
        }else {
            $updates = TaxUpdate::get();
        }
        
        return view('pages.admin.taxUpdate.index', [
            "categories" => $categories,
            "updates"=> $updates
        ]);
    }

    public function create()
    {
        $taxUpdateCategories = TaxUpdateCategory::all();

        return view('pages.admin.taxUpdate.create',[
            "taxUpdateCategories" => $taxUpdateCategories
        ]);
    }

    public function store(TaxUpdateRequest $request)
    {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        
        if($request->file('photo'))
        {
            $data['photo'] = $request->file('photo')->store('update');
        }

        if($request->file('pdf'))
        {
            $data['pdf'] = $request->file('pdf')->store('update/pdf');
        }

        $data['slug'] = Str::slug($request->title);
        $data['slug_eng'] = Str::slug($request->title_eng);
        
        TaxUpdate::create($data);

        return redirect()->route('update.index');
    }

    public function edit($id)
    {
        $item = TaxUpdate::findOrFail($id);
        $taxUpdateCategories = TaxUpdateCategory::all();

        return view('pages.admin.taxUpdate.edit',[
            "item" => $item,
            "taxUpdateCategories" => $taxUpdateCategories,

        ]);
    }

    public function update(TaxUpdateRequest $request, $id)
    {
        $data = $request->all();

        $item = TaxUpdate::findOrFail($id);
        
        $data['user_id'] = Auth::user()->id;
        
        if($request->file('photo'))
        {
            if($request->oldImage)
            {
                Storage::delete($request->oldImage);
            }
            $data['photo'] = $request->file('photo')->store('update');
        }

        if($request->file('pdf'))
        {
            if($request->oldFile)
            {
                Storage::delete($request->oldFile);
            }
            $data['pdf'] = $request->file('pdf')->store('update/pdf');
        }

        $data['slug'] = Str::slug($request->title);
        $data['slug_eng'] = Str::slug($request->title_eng);

        $item->update($data);
        return redirect()->route('update.index');
    }

    public function destroy($id)
    {
        $item = TaxUpdate::findOrFail($id);
        Storage::delete($item->photo);
        Storage::delete($item->pdf);
        $item->delete();

        return redirect()->route('update.index');
    }
}
