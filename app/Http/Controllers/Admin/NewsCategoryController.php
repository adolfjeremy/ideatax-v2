<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

use App\Http\Requests\NewsCategoryRequest;
use Yajra\DataTables\Facades\DataTables;

class NewsCategoryController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $query = NewsCategory::query(); 
            return Datatables::of($query)
            ->addColumn('action', function($item) {
                 return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="' . route('category.edit', $item->id) .'">Edit</a>
                            <form action="' . route('category.destroy', $item->id) . '" method="POST">
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
        return view('pages.admin.newsCategory.index');
    }

    public function create()
    {
        return view('pages.admin.newsCategory.create');
    }

    public function store(NewsCategoryRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        NewsCategory::create($data);

        return redirect()->route('category.index');
    }

    public function edit($id)
    {
        $item = NewsCategory::findOrFail($id);

        return view('pages.admin.newsCategory.edit',[
            'item' => $item
        ]);
    }

    public function update(NewsCategoryRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->title);

        $item = NewsCategory::findOrFail($id);
        $item->update($data);

        return redirect()->route('category.index');
    }

    public function destroy($id)
    {
        $item = NewsCategory::findOrFail($id);
        $item->delete();

        return redirect()->route('category.index');
    }
}
