<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class berita extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'description',
        'teaser',
        'category',
        'title',
        'date'
    ];

    protected $casts = [
        'date' => 'datetime',
    ];
}
