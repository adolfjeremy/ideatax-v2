<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'slug', 'position', 'photo','biography', 'area_of_expertise', 'profile_picture', 'phone','email','linkedin', 'SEO_title', 'SEO_title_eng', 'biography_eng', 'area_of_expertise_eng', 'description', 'description_eng'
    ];
}
