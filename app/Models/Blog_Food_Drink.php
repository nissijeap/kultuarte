<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog_Food_Drink extends Model
{
    use HasFactory;
    protected $table = 'blog_food_drink';
    protected $fillable = [
        'blog_post',
        'content',
    ];
}
