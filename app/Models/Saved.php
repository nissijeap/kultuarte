<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Saved extends Model
{
    use HasFactory;
    protected $table = 'saved';
    protected $fillable = [
        'post_id',
        'user_id'
    ];

    public function post()
    {
        return $this->hasOne(Post::class, 'id', 'post_id');
    }
}
