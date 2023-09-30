<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Http\Requests\ApplicantRequest;
use App\Mail\CareerApplicationMail;
use App\Models\Career;

class ApplicantController extends Controller
{
   
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ApplicantRequest $request)
    {
        $data = $request->all();
        $data['resume'] = $request->file('resume')->store('applicant');
        $position = Career::where('id', $data['career_id'])->firstOrFail();
        Mail::to("adolf.jer@gmail.com")->send(new CareerApplicationMail($data['name'], $position->title, $data['email'], $data['phone'], $data['coverLetter'], $data['resume']));
        Applicant::create($data);

        return redirect()->back()->with([
            'successAlert' => "Application sent"
        ]);
    }
}