<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerQuestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'title' ,'slug', 'email', 'question', 'answer', 'photo', 'status', 'tax_update_categories_id', 'title_eng', 'question_eng', 'answer_eng', 'seo_title_eng', 'seo_title', 'description_eng', 'description'
    ];

    public function taxUpdateCategory()
    {
        return $this->belongsTo(TaxUpdateCategory::class, "tax_update_categories_id", "id");
    }
}