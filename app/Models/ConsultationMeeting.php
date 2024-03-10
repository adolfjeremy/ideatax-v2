<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ConsultationMeeting extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'service_id',
        'schedule',
        'description',
    ];
}
