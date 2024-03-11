<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog_Language extends Model
{
    use HasFactory;
    protected $table = 'blog_language';
    protected $fillable = [
        'blog_post',
        'content',
    ];

}
