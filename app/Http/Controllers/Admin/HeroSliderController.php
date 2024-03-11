<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlider;
use App\Models\Services;
use Illuminate\Http\Request;

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

        return view('pages.admin.HomeSlider.index', [
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
        $services = Services::get();
        return view('pages.admin.HomeSlider.create',[
            "services" => $services
        ]);
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

        HeroSlider::create($data);

        return redirect()->route('hero-slider.index');
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
        $services = Services::get();
        $item = HeroSlider::findOrFail($id);

        return view('pages.admin.HomeSlider.edit',[
            "services" => $services,
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

        $item = HeroSlider::findOrFail($id);
        $item->update($data);

        return redirect()->route('hero-slider.index');
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
