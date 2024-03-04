<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Recently_Viewed extends Model
{
    use HasFactory;
    use SoftDeletes;
    use \Askedio\SoftCascade\Traits\SoftCascadeTrait;
    protected $table = 'recently_viewed';
    protected $fillable = [
        'post_id',
        'user_id'
    ];

    public function post()
    {
        return $this->hasOne(Post::class, 'id', 'post_id');
    }
}
