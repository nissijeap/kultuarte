<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog_Religion extends Model
{
    use HasFactory;
    protected $table = 'blog_religions';
    protected $fillable = [
        'blog_post',
        'content',
    ];
}
