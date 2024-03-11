<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog_Politic extends Model
{
    use HasFactory;
    protected $table = 'blog_politics';
    protected $fillable = [
        'blog_post',
        'content',
    ];
}
