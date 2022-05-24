<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerQuestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'title' ,'slug', 'email', 'question', 'answer', 'photo', 'status', 'tax_update_categories_id'
    ];

    public function taxUpdateCategory()
    {
        return $this->belongsTo(TaxUpdateCategory::class, "tax_update_categories_id", "id");
    }
}