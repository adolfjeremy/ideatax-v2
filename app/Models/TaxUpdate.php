<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxUpdate extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','slug', 'photo', 'body', "tax_update_categories_id",
    ];

    public function taxUpdateCategory()
    {
        return $this->belongsTo(TaxUpdateCategory::class, "tax_update_categories_id", "id");
    }
}
