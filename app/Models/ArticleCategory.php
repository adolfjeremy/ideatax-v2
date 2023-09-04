<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleCategory extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','slug', 'seo_title', 'seo_title_eng', 'description', 'description_eng'
    ];

    public function post()
    {
        return $this->hasMany(Article::class);
    }
}
