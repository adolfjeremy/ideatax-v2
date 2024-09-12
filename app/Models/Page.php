<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $fillable = [
        'title', 'SEO_title', 'description', 'SEO_title_eng', 'description_eng', 'SEO_title_jpn', 'description_jpn'
    ];
}
