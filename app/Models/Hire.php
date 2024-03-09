<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hire extends Model
{
    use HasFactory;

    protected $fillable = [
        'hirer_id',
        'hiree_id',
        'status',
        'approval_date',
        'start_date',
        'end_date',
    ];

    public function hirer()
    {
        return $this->belongsTo(User::class, 'hirer_id');
    }

    public function hiree()
    {
        return $this->belongsTo(User::class, 'hiree_id');
    }
}
