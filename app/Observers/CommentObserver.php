<?php

namespace App\Observers;

use App\Models\Notification;
use App\Models\Comment;

class CommentObserver
{
    public function created(Comment $comment)
    {
        // Create notification
        Notification::create([
            'comment_id' => $comment->id,
            'message' => "New comment posted.",
        ]);
    }
}
