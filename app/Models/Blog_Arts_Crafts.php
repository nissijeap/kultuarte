<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog_Arts_Crafts extends Model
{
    use HasFactory;
    protected $table = 'blog_arts_crafts';
    protected $fillable = [
        'blog_post',
        'content',
    ];
}
