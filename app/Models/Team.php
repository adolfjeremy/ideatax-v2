<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'slug', 
        'position', 
        'photo',
        'biography', 
        'biography_eng', 
        'biography_jpn', 
        'area_of_expertise', 
        'area_of_expertise_eng', 
        'area_of_expertise_jpn', 
        'profile_picture', 
        'SEO_title', 
        'SEO_title_eng', 
        'SEO_title_jpn', 
        'description', 
        'description_jpn',
        'linkedin', 
        'email',
        'phone',
    ];
}
