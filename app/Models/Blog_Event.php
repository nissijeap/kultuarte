<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog_Event extends Model
{
    use HasFactory;
    protected $table = 'blog_events';
    protected $fillable = [
        'blog_post',
        'content',
    ];
}
