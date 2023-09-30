<?php

namespace App\Http\Controllers\Admin;

use App\Models\Services;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use Yajra\DataTables\Facades\DataTables;
use App\Http\Requests\ServicesRequest;

class ServicesController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $query = Services::query(); 
            return Datatables::of($query)
            ->addColumn('action', function($item) {
                 return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="' . route('services.edit', $item->id) .'">Edit</a>
                            <form action="' . route('services.destroy', $item->id) . '" method="POST">
                                ' . method_field('delete') . csrf_field() .'
                                <button type="submit" class="dropdown-item text-danger">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                ';
            })
            ->rawColumns(['action'])
            -> make();
        }
        return view('pages.admin.services.index');
    }

     public function create()
    {
        return view('pages.admin.services.create');
    }

     public function store(ServicesRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['excerpt'] = Str::limit($request->description, 130);
        $data['excerpt_eng'] = Str::limit($request->description_eng, 130);
        $servicesCount = Services::all()->count();
        $data['order'] = $servicesCount + 1;        

        Services::create($data);

        return redirect()->route('services.index');
    }

    public function edit($id)
    {
        $item = Services::findOrFail($id);
        return view('pages.admin.services.edit',[
            'item' => $item
        ]);
    }

    public function update(ServicesRequest $request, $id)
    {

        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $item = Services::findOrFail($id);

        
        if($request->description)
        {   
            $data['excerpt'] = Str::limit($request->description, 130);
        }

        if($request->description_eng)
        {   
            $data['excerpt_eng'] = Str::limit($request->description_eng, 130);
        }

        if($request->order)
        {
            $sameOrder = Services::where('order', $request->order)->first();
            if($sameOrder->order)
            {
                $sameOrder->update(['order' => $item->order]);
            }
        }

        $item->update($data);

        return redirect()->route('services.index');
    }

    public function destroy($id)
    {
        $item = Services::findOrFail($id);
        $item->delete();

        return redirect()->route('services.index');
    }
}
