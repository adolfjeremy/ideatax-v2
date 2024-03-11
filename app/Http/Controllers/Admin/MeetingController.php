<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ConsultationMeeting;
use Illuminate\Http\Request;

class MeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $schedules = ConsultationMeeting::get();

        return view('pages.admin.consultationMeeting.index', [
            "schedules" => $schedules
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
     * @param  \App\Models\ConsultationMeeting  $consultationMeeting
     * @return \Illuminate\Http\Response
     */
    public function show(ConsultationMeeting $consultationMeeting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ConsultationMeeting  $consultationMeeting
     * @return \Illuminate\Http\Response
     */
    public function edit(ConsultationMeeting $consultationMeeting)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ConsultationMeeting  $consultationMeeting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ConsultationMeeting $consultationMeeting)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ConsultationMeeting  $consultationMeeting
     * @return \Illuminate\Http\Response
     */
    public function destroy(ConsultationMeeting $consultationMeeting)
    {
        //
    }
}
