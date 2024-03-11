<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog_People extends Model
{
    use HasFactory;
    protected $table = 'blog_people';
    protected $fillable = [
        'blog_post',
        'content',
    ];
}
