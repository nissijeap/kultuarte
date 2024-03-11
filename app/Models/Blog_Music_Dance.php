<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog_Music_Dance extends Model
{
    use HasFactory;
    protected $table = 'blog_music_dance';
    protected $fillable = [
        'blog_post',
        'content',
    ];
}
