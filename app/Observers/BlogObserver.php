<?php

namespace App\Observers;

use App\Models\Notification;
use App\Models\Blog;

class BlogObserver
{
    public function created(Blog $blog)
    {
        // Create notification
        Notification::create([
            'blog_id' => $blog->id,
            'message' => "New blog published.",
        ]);
    }
}
