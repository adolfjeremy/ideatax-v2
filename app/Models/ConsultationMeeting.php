<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ConsultationMeeting extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'email',
        'phone',
        'company',
        'service_id',
        'schedule',
        'description',
    ];

    public function service()
    {
        return $this->belongsTo(Services::class, "service_id", "id");
    }
}
