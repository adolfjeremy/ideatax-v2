<?php

namespace App\Http\Controllers\Admin;

use App\Models\TaxEvent;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TaxEventRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class TaxEventController extends Controller
{
    public function index()
    {
        $search = request()->query('search');
        if($search) {
            $events = TaxEvent::where('title', 'LIKE', "%{$search}%")->get();
        } else {
            $events = TaxEvent::get();
        }
        return view('pages.admin.taxEvent.index', [
            "events" => $events
        ]);
    }

    public function create() {
        return view('pages.admin.taxEvent.create');
    }

    public function store(TaxEventRequest $request) {
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;

        if($request->file('photo'))
        {
            $data['photo'] = $request->file('photo')->store('event');
        }

        $data['slug'] = Str::slug($request->title);
        $data['slug_eng'] = Str::slug($request->title_eng);
        $data['slug_jpn'] = Str::slug($request->title_jpn);

        TaxEvent::create($data);

        return redirect()->route('event.index');
    }

    public function edit($id)
    {
        $item = TaxEvent::findOrFail($id);
        return view('pages.admin.taxEvent.edit',[
            'item' => $item
        ]);
    }

    public function update(TaxEventRequest $request, $id)
    {
        $data = $request->all();
        
        $item = TaxEvent::findOrFail($id);
        $data['user_id'] = Auth::user()->id;

        if($request->file('photo'))
        {
            if($request->oldImage)
            {
                Storage::delete($request->oldImage);
            }
            $data['photo'] = $request->file('photo')->store('event');
        }

        $data['slug'] = Str::slug($request->title);
        $data['slug_eng'] = Str::slug($request->title_eng);
        $data['slug_jpn'] = Str::slug($request->title_jpn);
        
        $item->update($data);

        return redirect()->route('event.index');
    }

    public function destroy($id)
    {
        $item = TaxEvent::findOrFail($id);
        Storage::delete($item->photo);
        $item->delete();

        return redirect()->route('event.index');
    }
}
