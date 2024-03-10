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
        'slug_eng'
    ];
}
