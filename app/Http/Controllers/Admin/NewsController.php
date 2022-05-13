<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Http\Requests\NewsRequest;
use Yajra\DataTables\Facades\DataTables;
use App\Models\News;
use App\Models\NewsCategory;
use Illuminate\Support\Facades\Storage;

class NewsController extends Controller
{
    public function index()
    {
        if(request()->ajax())
        {
            $query = News::query(); 
            return Datatables::of($query)
            ->addColumn('action', function($item) {
                 return '
                    <div class="btn-group">
                        <button type="button" class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                            Action
                        </button>
                        <div class="dropdown-menu">
                            <a class="dropdown-item" href="' . route('news.edit', $item->id) .'">Edit</a>
                            <form action="' . route('news.destroy', $item->id) . '" method="POST">
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
                return $item->photo ? '<img src ="'. asset("storage/" . $item->photo) .'" style="max-height:80px; border-radius: 0;"/>' : "";
            })
            ->editColumn('news_categories_id', function($item) {
                return $item->newsCategory ? $item->newsCategory->title : "";
            })
            ->rawColumns(['action', 'photo', 'news_categories_id'])
            -> make();
        }
        return view('pages.admin.news.index');
    }

    public function create() {
        $newsCategories = NewsCategory::all();

        return view('pages.admin.news.create', [
            'newsCategories' => $newsCategories
        ]);
    }

    public function store(NewsRequest $request) {
        $data = $request->all();

        if($request->file('photo'))
        {
            $data['photo'] = $request->file('photo')->store('news');
        }

        $data['slug'] = Str::slug($request->title);
        News::create($data);

        return redirect()->route('news.index');
    }

    public function edit($id)
    {
        $item = News::findOrFail($id);
        $newsCategories = NewsCategory::all();

        return view('pages.admin.news.edit',[
            'item' => $item,
            'newsCategories' => $newsCategories,
        ]);
    }

    public function update(NewsRequest $request, $id)
    {
        $data = $request->all();

        $item = News::findOrFail($id);

        if($request->file('photo'))
        {
            if($request->oldImage)
            {
                Storage::delete($request->oldImage);
            }
            $data['photo'] = $request->file('photo')->store('news');
        }
        
        $data['slug'] = Str::slug($request->title);

        $item->update($data);

        return redirect()->route('news.index');
    }

    public function destroy($id)
    {
        $item = News::findOrFail($id);
        Storage::delete($item->photo);
        $item->delete();

        return redirect()->route('news.index');
    }
}
