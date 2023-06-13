<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','slug', 'photo', 'body', 'article_categories_id', 'user_id'
    ];

    public function articleCategory()
    {
        return $this->belongsTo(ArticleCategory::class, "article_categories_id", "id");
    }

    public function user()
    {
        return $this->belongsTo(User::class, "user_id", "id");
    }
}
