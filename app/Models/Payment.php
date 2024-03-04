<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    use HasFactory;

    protected $fillable = [
        'sold_by',
        'sold_to',
        'post_id',
        'channel',
        'amount',
        'status',
        'receipt',
        'verified_at',
    ];

    public function soldBy()
    {
        return $this->belongsTo(User::class, 'sold_by');
    }

    public function soldTo()
    {
        return $this->belongsTo(User::class, 'sold_to');
    }

    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
