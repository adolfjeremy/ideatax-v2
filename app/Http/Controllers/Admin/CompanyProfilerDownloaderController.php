<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CompanyProfileDonwloaderInfo;
use Illuminate\Http\Request;

class CompanyProfilerDownloaderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = CompanyProfileDonwloaderInfo::get();

        return view('pages.admin.companyProfilerDownloader.index', [
            "items" => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CompanyProfileDonwloaderInfo  $companyProfileDonwloaderInfo
     * @return \Illuminate\Http\Response
     */
    public function show(CompanyProfileDonwloaderInfo $companyProfileDonwloaderInfo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CompanyProfileDonwloaderInfo  $companyProfileDonwloaderInfo
     * @return \Illuminate\Http\Response
     */
    public function edit(CompanyProfileDonwloaderInfo $companyProfileDonwloaderInfo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CompanyProfileDonwloaderInfo  $companyProfileDonwloaderInfo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CompanyProfileDonwloaderInfo $companyProfileDonwloaderInfo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CompanyProfileDonwloaderInfo  $companyProfileDonwloaderInfo
     * @return \Illuminate\Http\Response
     */
    public function destroy(CompanyProfileDonwloaderInfo $companyProfileDonwloaderInfo)
    {
        //
    }
}
