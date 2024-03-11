<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog_History extends Model
{
    use HasFactory;
    protected $table = 'blog_histories';
    protected $fillable = [
        'blog_post',
        'content',
    ];
}
