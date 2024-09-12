<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxEvent extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'title_eng', 
        'title_jpn', 
        'slug', 
        'slug_eng', 
        'slug_jpn', 
        'body', 
        'body_eng', 
        'body_jpn', 
        'photo', 
        'user_id', 
        'SEO_title', 
        'SEO_title_eng', 
        'SEO_title_jpn', 
        'description', 
        'description_eng',
        'description_jpn'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
