<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'description',
        'excerpt',
        'title_eng',
        'description_eng',
        'excerpt_eng',
        'order',
        'image',
        'slug_eng',
        'SEO_title',
        'SEO_title_eng',
        'meta_description',
        'meta_description_eng'

    ];
}
