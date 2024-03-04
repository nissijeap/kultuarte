<?php

namespace App\Observers;

use App\Models\Notification;
use App\Models\Like;

class LikeObserver
{
    public function created(Like $like)
    {
        // Create notification
        Notification::create([
            'like_id' => $like->id,
            'message' => "New like received",
        ]);
    }
}
