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
        'date',
        'author',
        'status'
    ];

    protected $casts = [
        'date' => 'datetime',
    ];

    public function comments()
    {
        return $this->hasMany(Comment::class, 'news_id');
    }

    public function getStatusAttribute($value)
    {
        if ($value !== null) {
            return $value;
        }

        if ($this->category === 'CitizenJournalist') {
            return 'pending';
        }

        return 'verified';
    }
}
