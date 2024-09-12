<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 
        'title_eng', 
        'title_jpn', 
        'slug', 
        'slug_eng', 
        'slug_jpn', 
        'jobdesc', 
        'jobdesc_eng', 
        'jobdesc_jpn', 
        'qualification', 
        'qualification_eng', 
        'qualification_jpn', 
        'skill', 
        'skill_eng', 
        'skill_jpn', 
        'course',
        'course_eng', 
        'course_jpn', 
        'SEO_title', 
        'SEO_title_eng', 
        'SEO_title_jpn', 
        'description', 
        'description_eng',
        'description_jpn'
    ];
}
