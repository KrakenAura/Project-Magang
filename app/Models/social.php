<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class social extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_tv',
        'logo',
        'link_web',
        'link_insta',
        'link_yt'
    ];
}
