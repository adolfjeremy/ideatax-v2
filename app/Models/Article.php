<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'photo', 
        'thumbnail', 
        'title',
        'title_eng', 
        'title_jpn', 
        'slug', 
        'slug_eng',
        'slug_jpn',
        'body', 
        'body_eng', 
        'body_jpn', 
        'SEO_title', 
        'SEO_title_eng', 
        'SEO_title_jpn', 
        'description', 
        'description_eng', 
        'description_jpn', 
        'article_categories_id', 
        'user_id', 
        'author_id',
    ];

    public function articleCategory()
    {
        return $this->belongsTo(ArticleCategory::class, "article_categories_id", "id");
    }

    public function author()
    {
        return $this->belongsTo(Author::class, "author_id", "id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
