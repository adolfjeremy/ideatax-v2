<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ConsultationMeeting;

class ConsultationMeetingController extends Controller
{
    public function store(Request $request)
    {
        $data = $request->all();

        ConsultationMeeting::create($data);

        return redirect()->back()->with('success', 'Consultation meeting set');
    }
}
