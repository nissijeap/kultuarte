<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog_Location extends Model
{
    use HasFactory;
    protected $table = 'blog_locations';
    protected $fillable = [
        'blog_post',
        'content',
    ];
}
