<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaxEvent extends Model
{
    use HasFactory;
    protected $fillable = [
        'title','slug', 'photo', 'body',
    ];
}
