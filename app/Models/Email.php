<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    use HasFactory;

    protected $fillable = [
        'send_name',
        'send_email',
        'subject',
        'message',
        'rcpt_name',
        'rcpt_email',
        'status',
    ];
    
}
