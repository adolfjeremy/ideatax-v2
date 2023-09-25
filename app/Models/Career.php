<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    use HasFactory;
    protected $fillable = [
        'slug', 
        'title', 
        'jobdesc', 
        'qualification', 
        'skill', 
        'course',
        'jobdesc_eng', 
        'qualification_eng', 
        'skill_eng', 
        'course_eng', 
        'SEO_title', 
        'SEO_title_eng', 
        'description', 
        'description_eng'
    ];
}
