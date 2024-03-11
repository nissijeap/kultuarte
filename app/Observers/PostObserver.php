<?php

namespace App\Observers;

use App\Models\Notification;
use App\Models\Post;

class PostObserver
{
    public function created(Post $post)
    {
        // Create notification
        Notification::create([
            'post_id' => $post->id,
            'message' => "New artworks shared.",
        ]);
    }
}
