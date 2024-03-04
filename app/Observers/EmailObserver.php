<?php

namespace App\Observers;

use App\Models\Notification;
use App\Models\Email;

class EmailObserver
{
    public function created(Email $email)
    {
        // Create notification
        Notification::create([
            'email_id' => $email->id,
            'message' => "New email sent/received.",
        ]);
    }
}
