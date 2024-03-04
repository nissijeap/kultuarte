<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use App\Models\Post;
use App\Observers\PostObserver;
use App\Models\Blog;
use App\Observers\BlogObserver;
use App\Models\User;
use App\Observers\UserObserver;
use App\Models\Email;
use App\Observers\EmailObserver;
use App\Models\Like;
use App\Observers\LikeObserver;
use App\Models\Comment;
use App\Observers\CommentObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrapFive();

        Post::observe(PostObserver::class);
        Blog::observe(BlogObserver::class);
        User::observe(UserObserver::class);
        Email::observe(EmailObserver::class);
        Like::observe(LikeObserver::class);
        Comment::observe(CommentObserver::class);
    }
}