<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
    protected $softCascade = ['comment_likes'];
    protected $fillable = [
        'post_id',
        'user_id',
        'comment',
        'parent_comment_id',
        'upvotes'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_comment_id');
    }

    public function comment_likes()
    {
        return $this->hasMany(Comment_Like::class, 'comment_id', 'id');
    }
    
    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id');
    }

    public function blog()
    {
        return $this->belongsTo(Blog::class, 'blog_id');
    }
}
