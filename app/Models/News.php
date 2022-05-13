<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','slug', 'photo', 'body', 'news_categories_id',
    ];

    public function newsCategory()
    {
        return $this->belongsTo(NewsCategory::class, "news_categories_id", "id");
    }
}
