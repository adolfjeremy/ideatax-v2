<?php

namespace App\Http\Controllers\Admin;

use App\Models\Author;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\AuthorRequest;
use Illuminate\Support\Facades\Storage;
use Yajra\DataTables\Facades\DataTables;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::get();
        return view('pages.admin.author.index', [
            "authors" => $authors
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AuthorRequest $request)
    {
        $data = $request->all();

        $data['image'] = $request->file('image')->store('author');

        Author::create($data);

        return redirect()->route('author.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function show(Author $author)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Author  ::findOrFail($id);

        return view('pages.admin.author.edit',[
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function update(AuthorRequest $request, $id)
    {
        $data = $request->all();

        $item = Author::findOrFail($id);

        if($request->file('image'))
        {
            if($request->oldImage)
            {
                Storage::delete($request->oldImage);
            }
            $data['image'] = $request->file('image')->store('author');
        }

        $item->update($data);

        return redirect()->route('author.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Author  $author
     * @return \Illuminate\Http\Response
     */
    public function destroy(Author $author)
    {
        //
    }
}
