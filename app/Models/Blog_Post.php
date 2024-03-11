<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog_Post extends Model
{
    use HasFactory;
    protected $table = 'blog_posts';
    protected $fillable = [
        'title',
        'user_id',
        'blog_category',
        'ethnic_group',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function ethnicity()
    {
        return $this->belongsTo(Ethnic_Groups::class, 'ethnic_group');
    }

    public function language()
    {
        return $this->hasOne(Blog_Language::class, 'blog_post', 'id');
    }

    public function arts_crafts()
    {
        return $this->hasOne(Blog_Arts_Crafts::class, 'blog_post', 'id');
    }

    public function events()
    {
        return $this->hasOne(Blog_Event::class, 'blog_post', 'id');
    }

    public function food_drink()
    {
        return $this->hasOne(Blog_Food_Drink::class, 'blog_post', 'id');
    }

    public function history()
    {
        return $this->hasOne(Blog_History::class, 'blog_post', 'id');
    }

    public function location()
    {
        return $this->hasOne(Blog_Location::class, 'blog_post', 'id');
    }

    public function music_dance()
    {
        return $this->hasOne(Blog_Music_Dance::class, 'blog_post', 'id');
    }

    public function people()
    {
        return $this->hasOne(Blog_People::class, 'blog_post', 'id');
    }

    public function religion()
    {
        return $this->hasOne(Blog_Religion::class, 'blog_post', 'id');
    }

    public function politics()
    {
        return $this->hasOne(Blog_Politic::class, 'blog_post', 'id');
    }

}
