<?php

namespace App\Http\Controllers\Admin;

use App\Models\Services;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\ServicesRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class ServicesController extends Controller
{
    public function index()
    {
        $search = request()->query('search');
        if($search) {
            $services = Services::where('title', 'LIKE', "%{$search}%")->get();
        } else {

            $services = Services::get();
        }
        return view('pages.admin.services.index', [
            "services" => $services
        ]);
    }

     public function create()
    {
        return view('pages.admin.services.create');
    }

     public function store(ServicesRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);
        $data['slug_eng'] = Str::slug($request->title_eng);
        $data['excerpt'] = Str::limit($request->description, 130);
        $data['excerpt_eng'] = Str::limit($request->description_eng, 130);
        $servicesCount = Services::all()->count();
        $data['order'] = $servicesCount + 1;  

        if($request->file('image'))
        {
            $data['image'] = $request->file('image')->store('service');
        }        

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
        $item = Services::findOrFail($id);

        $data['slug'] = Str::slug($request->title);
        $data['slug_eng'] = Str::slug($request->title_eng);


        
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
        if($request->file('image'))
        {
            if($request->oldImage)
            {
                Storage::delete($request->oldImage);
            }
            $data['image'] = $request->file('image')->store('service');
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
