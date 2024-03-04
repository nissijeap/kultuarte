<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
    protected $softCascade = ['postlikes', 'bookmark'];
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

    public function media()
    {
        return $this->hasMany(Media::class, 'post_id', 'id');
    }

    public function postlikes()
    {
        return $this->hasMany(Like::class, 'post_id', 'id');
    }

    public function bookmark()
    {
        return $this->hasMany(Saved::class, 'post_id', 'id');
    }
}
