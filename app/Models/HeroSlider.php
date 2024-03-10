<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSlider extends Model
{
    protected $fillable = [
        'service_id'
    ];

    public function service()
    {
        return $this->belongsTo(Services::class, "service_id", "id");
    }
}
