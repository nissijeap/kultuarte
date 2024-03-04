<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

    protected $fillable = [
        'post_id',
        'blog_id',
        'like_id',
        'comment_id',
        'user_id',
        'email_id',
        'message',
        'is_read',
        'read_at',
    ];

    protected static function boot()
    {
        parent::boot();

        // Event listener for creating notifications
        static::creating(function ($notification) {
            // Set default values
            $notification->is_read = 0;
        });
    }


    /**
     * Get the post associated with the notification.
     */
    public function post()
    {
        return $this->belongsTo(Post::class);
    }

    /**
     * Get the blog associated with the notification.
     */
    public function blog()
    {
        return $this->belongsTo(Blog::class);
    }

    /**
     * Get the like associated with the notification.
     */
    public function like()
    {
        return $this->belongsTo(Like::class);
    }

    /**
     * Get the comment associated with the notification.
     */
    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }

    /**
     * Get the user associated with the notification.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the email associated with the notification.
     */
    public function email()
    {
        return $this->belongsTo(Email::class);
    }
}
