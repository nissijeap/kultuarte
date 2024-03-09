<?php

namespace App\Observers;

use App\Models\Notification;
use App\Models\User;

class UserObserver
{
    public function created(User $user)
    {
        // Create notification
        Notification::create([
            'user_id' => $user->id,
            'message' => "New user registered.",
        ]);
    }
}
