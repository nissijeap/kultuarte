<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'category_id',
        'content',
        'views'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function postlikes()
    {
        return $this->hasMany(Like::class, 'post_id', 'id');
    }
}
