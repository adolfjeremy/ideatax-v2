<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerQuestion extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'title' ,'slug', 'email', 'question', 'answer', 'photo', 'status'
    ];
}
