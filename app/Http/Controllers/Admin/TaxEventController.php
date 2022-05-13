<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\TaxEventRequest;
use App\Models\TaxEvent;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class TaxEventController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $query = TaxEvent::query(); 
            return Datatables::of($query)
            ->addColumn('action', function($item) {
                 return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="' . route('event.edit', $item->id) .'">Edit</a>
                            <form action="' . route('event.destroy', $item->id) . '" method="POST">
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
                return $item->photo ? '<img src ="'. asset("storage/" . $item->photo) .'" style="max-height:80px; border-radius: 0;"/>' : "none";
            })
            ->rawColumns(['action', 'photo'])
            -> make();
        }
        return view('pages.admin.taxEvent.index');
    }

    public function create() {
        return view('pages.admin.taxEvent.create');
    }

    public function store(TaxEventRequest $request) {
        $data = $request->all();

        if($request->file('photo'))
        {
            $data['photo'] = $request->file('photo')->store('event');
        }

        $data['slug'] = Str::slug($request->title);
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

        if($request->file('photo'))
        {
            if($request->oldImage)
            {
                Storage::delete($request->oldImage);
            }
            $data['photo'] = $request->file('photo')->store('event');
        }

        $data['slug'] = Str::slug($request->title);
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
