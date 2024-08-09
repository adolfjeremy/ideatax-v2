<?php

namespace App\Http\Controllers\Admin;

use App\Models\HeroSlider;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class HeroSliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $heroes = HeroSlider::get();

        return view('pages.admin.hero.index', [
            "heroes" => $heroes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
        return view('pages.admin.hero.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        if($request->file('hero'))
        {
            if($request->oldImage)
            {
                Storage::delete($request->oldImage);
            }
            $data['hero'] = $request->file('hero')->store('hero');
        }

        HeroSlider::create($data);

        return redirect()->route('hero.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HeroSlider  $heroSlider
     * @return \Illuminate\Http\Response
     */
    public function show(HeroSlider $heroSlider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HeroSlider  $heroSlider
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = HeroSlider::findOrFail($id);

        return view('pages.admin.hero.edit',[
            "item" => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HeroSlider  $heroSlider
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        if($request->file('hero'))
        {
            if($request->oldImage)
            {
                Storage::delete($request->oldImage);
            }
            $data['hero'] = $request->file('hero')->store('hero');
        }

        $item = HeroSlider::findOrFail($id);
        $item->update($data);

        return redirect()->route('hero.edit',1);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HeroSlider  $heroSlider
     * @return \Illuminate\Http\Response
     */
    public function destroy(HeroSlider $heroSlider)
    {
        //
    }
}
