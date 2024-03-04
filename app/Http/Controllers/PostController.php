<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Media;
use App\Models\User;
use App\Models\Category;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-post|edit-post|delete-post', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-post', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-post', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-post', ['only' => ['destroy']]);
    }

    public function index()
    {
        $posts = Post::all();

        return view('posts.index', compact('posts'));
    }

    public function exhibits()
    {
        $posts = Post::all();

        return view('posts.exhibits', compact('posts'));
    }

    public function artists()
    {
        $posts = Post::all();

        return view('posts.artists', compact('posts'));
    }

    public function transactions()
    {
        $posts = Post::all();

        return view('posts.transactions', compact('posts'));
    }


    public function create() 
    {
        $posts = Post::all();
        return view('posts.create', compact('posts'));
    }

    public function store(Request $request)
    {
        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->category_id = 1; 
        $post->content = $request->input('content');
        $post->save();

        if ($request->hasFile('file')) {
            $allowedfileExtension = ['jpeg', 'png', 'jpg', 'gif', 'svg', 'mp4'];
            $mediaFiles = $request->file('file');

            foreach ($mediaFiles as $media) {
                $extension = $media->getClientOriginalExtension();
                $check = in_array($extension, $allowedfileExtension);

                if ($check) {
                    $mediaName = 'media_' . uniqid() . '.' . $extension;

                    // Move the uploaded file to the public/medias directory
                    $media->move(public_path('medias/'), $mediaName);

                    // Create a new Media instance
                    $newMedia = new Media();

                    // Assign values to the Media instance
                    $newMedia->post_id = $post->id;
                    $newMedia->media = $mediaName;

                    // Save the Media instance to the database
                    $newMedia->save();
                }
            }
        }

        // Redirect to the desired page after successful submission
        return redirect()->route('posts.index')->with('success', 'Post created successfully');
    }

    
}
