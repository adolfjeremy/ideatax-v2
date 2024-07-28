<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSlider extends Model
{
    protected $fillable = [
        'hero', 'cta', 'cta_eng', 'button', 'button_eng',
    ];
}
