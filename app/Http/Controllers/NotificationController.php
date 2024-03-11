<?php

namespace App\Http\Controllers;

use App\Models\Notification;
use App\Models\Post;
use App\Models\Like;
use App\Models\Comment;
use App\Models\Blog;
use App\Models\User;
use App\Models\Email;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:view-notification', ['only' => ['index', 'show']]);
        $this->middleware('permission:delete-notification', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = auth()->user()->id;
        $authUser = auth()->user()->get;

        $posts = Post::orderBy('created_at', 'desc')->get();
        $blogs = Blog::orderBy('created_at', 'desc')->get();
        $emails = Email::orderBy('created_at', 'desc')->get();
        $users = User::orderBy('created_at', 'desc')->get();
        $likes = Like::orderBy('created_at', 'desc')->get();
        $comments = Comment::orderBy('created_at', 'desc')->get();

        $postCount = Post::where('user_id', $userId)->count();
        $latestPost = Post::where('user_id', auth()->user()->id)
        ->orderBy('created_at', 'desc')
        ->first();

        $blogCount = Blog::where('user_id', $userId)->count();
        $latestBlog = Blog::where('user_id', auth()->user()->id)
        ->orderBy('created_at', 'desc')
        ->first();

        $postViews = Post::where('user_id', auth()->user()->id)->sum('views');
        $blogViews = Blog::where('user_id', auth()->user()->id)->sum('views');
        $totalViews = $postViews + $blogViews;

        $postLikesCount = Like::whereHas('post', function ($query) {
            $query->where('user_id', Auth::id());
        })->count();
        $blogLikesCount = Like::whereHas('blog', function ($query) {
            $query->where('user_id', Auth::id());
        })->count();
        $totalLikesCount = $postLikesCount + $blogLikesCount;

        $postCommentsCount = Comment::whereHas('post', function ($query) {
            $query->where('user_id', Auth::id());
        })->count();
        $blogCommentsCount = Comment::whereHas('blog', function ($query) {
            $query->where('user_id', Auth::id());
        })->count();
        $totalCommentsCount = $postCommentsCount + $blogCommentsCount;

        // $notifications = Notification::all();
        $notifications = Notification::orderBy('created_at', 'desc')->get();

        return view('notifications.index', compact('emails', 'likes', 'comments', 'users', 'blogs','posts', 'notifications', 'postCount', 'blogCount', 'latestPost', 'latestBlog', 'totalViews', 'totalLikesCount', 'totalCommentsCount'));
    }

    public function redirect(Notification $notification)
    {
        switch (true) {
            case $notification->like_id:
                // Redirect to specific template based on like
                $notification->update(['is_read' => true]);
                if ($notification->like && $notification->like->post_id) {
                    return redirect()->route('posts.show', ['template' => $notification->like->post_id]);
                } elseif ($notification->like && $notification->like->blog_id) {
                    return redirect()->route('blogs.show', ['template' => $notification->like->blog_id]);
                } else {
                    // Handle the case where like_id exists but post_id or blog_id is null
                    // Redirect to a default route or show an error message
                }
                break;
            case $notification->comment_id:
                // Redirect to specific template based on comment
                $notification->update(['is_read' => true]);
                if ($notification->comment && $notification->comment->post_id) {
                    return redirect()->route('posts.show', ['template' => $notification->comment->post_id]);
                } else {
                    // Handle the case where comment_id exists but post_id is null
                    // Redirect to a default route or show an error message
                }
                break;
            case $notification->post_id:
                // Redirect to specific template
                $notification->update(['is_read' => true]);
                return redirect()->route('posts.show', ['post' => $notification->post_id]);
                break;
            case $notification->blog_id:
                // Redirect to specific template
                $notification->update(['is_read' => true]);
                return redirect()->route('blogs.show', ['blog' => $notification->blog_id]);
                break;
            case $notification->email_id:
                // Redirect to specific email
                $notification->update(['is_read' => true]);
                return redirect()->route('emails.show', ['email' => $notification->email_id]);
                break;
            case $notification->user_id:
                // Redirect to specific user
                $notification->update(['is_read' => true]);
                return redirect()->route('users.show', ['user' => $notification->user_id]);
                break;
            default:
                // Handle other cases or redirect to a default page
                break;
        }
    
        // Redirect the user to the desired page after updating is_read
        return redirect()->route('notifications.index');
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Notification $notification)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Notification $notification)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Notification $notification)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $notification = Notification::findOrFail($id);
        $notification->delete();

        // Optionally, you can redirect the user back to the permissions list
        return redirect()->route('notifications.index')->with('success', 'Notification deleted successfully');
    }
}
