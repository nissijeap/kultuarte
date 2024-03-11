<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog_Categories extends Model
{
    use HasFactory;
    protected $table = 'blog_categories';
    protected $fillable = [
        'category_name'
    ];
}
