<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Like;
use App\Models\Media;

class PostController extends Controller
{
    public function like(Request $request){
        $like = new Like();
        $like->post_id = $request->input('post_id');
        $like->user_id = $request->input('user_id');
        $like->save();
        return response()->json(['message' => 'Ticket updated successfully']);
    
}

    public function postCreate() {
        return view('posts.create');
    }

    public function store(Request $request) {
        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->category_id = 1;
        $post->content = $request->input('content');
        $post->save();
    
        if ($request->hasFile('files')) {
            $allowedfileExtension = ['jpeg', 'png', 'jpg', 'gif', 'svg', 'mp4'];
            $medias = $request->file('files');
    
            foreach ($medias as $media) {
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
                    $newMedia->media = 'medias/' . $mediaName;
    
                    // Save the Media instance to the database
                    $newMedia->save();
                }
            }
        }
    
        return view('posts.create');
    }
    
}
