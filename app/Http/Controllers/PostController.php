<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use App\Http\Requests\StoreLikeRequest;
use App\Http\Requests\UpdateLikeRequest;
use Illuminate\View\View;
use App\Models\Category;
use App\Models\Like;
use App\Models\Comment;
use App\Models\PostMedia;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class PostController extends Controller
{

    public function __construct()
    {
       $this->middleware('auth');
       $this->middleware('permission:create-post|edit-post|delete-post', ['only' => ['index','show']]);
       $this->middleware('permission:create-post', ['only' => ['create','store']]);
       $this->middleware('permission:edit-post', ['only' => ['edit','update']]);
       $this->middleware('permission:delete-post', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();
        $posts = Post::all();

        return view('posts.index', compact('posts', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $user = Auth::user();
        $categories = Category::all();
        $users = User::all();
        return view('posts.create', compact('user', 'users', 'categories'));
    }

    public function store(StorePostRequest $request): RedirectResponse
    {
        $userId = Auth::id();
        $requestData = array_merge($request->all(), ['user_id' => $userId]);

        Post::create($requestData);

        return redirect()->route('posts.index')->withSuccess('New post is added successfully.');
    }


    public function show(Post $post): View
    {
        $post->increment('views');

        $user = Auth::user();
        $categories = Category::all();
        $users = User::all();

        $post->content = htmlspecialchars_decode($post->content);
        $comments = Comment::where('post_id', $post->id)->get();

        // Calculate total likes for the post
        $totalPostLikes = Like::where('post_id', $post->id)->count();

        return view('posts.show', [
            'post' => $post,
            'user' => $user,
            'categories' => $categories,
            'users' => $users,
            'totalPostLikes' => $totalPostLikes,
            'comments' => $comments,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post): View
    {
        $user = Auth::user();
        $categories = Category::all();
        $users = User::all();

        return view('posts.edit', [
            'post' => $post,
            'user' => $user,
            'categories' => $categories,
            'users' => $users,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post): RedirectResponse
    {
        $post->update($request->all());
        return redirect()->route('posts.index')->withSuccess('Post is updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        return redirect()->route('posts.index')
                ->withSuccess('Post is deleted successfully.');
    }

    public function toggleLike($postId)
    {
        $user = Auth::user();
        $post = Post::findOrFail($postId);
    
        if (!$user->hasLikedPost($post->id)) {
            $user->like($post);
            $liked = true;
        } else {
            $user->unlike($post);
            $liked = false;
        }
    
        $totalLikes = $post->likes()->count();
    
        return response()->json([
            'success' => true,
            'liked' => $liked,
            'totalLikes' => $totalLikes,
        ]);
    }

}
