<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Post;
use App\Models\Like;
use App\Models\Media;
use App\Models\Saved;
use App\Models\Recently_Viewed;

class PostController extends Controller
{
    use SoftDeletes;
    public function arts()
    {
        return view('arts', [
            'posts' => Post::latest()->get(),
            'medias' => Media::latest()->get(),
            'saves' => Saved::where('user_id', '=', auth()->user()->id)->latest()->get(),
            'views' => Recently_Viewed::where('user_id', '=', auth()->user()->id)->latest()->get(),
        ]);
    }
    public function postCreate() {
        return view('posts.create',[
            'saves' => Saved::where('user_id', '=', auth()->user()->id)->latest()->get(),
            'views' => Recently_Viewed::where('user_id', '=', auth()->user()->id)->latest()->get(),
        ]);
    }

    public function store(Request $request) {
        $post = new Post();
        $post->user_id = auth()->user()->id;
        $post->category_id = 1;
        $post->content = $request->input('content');
        $post->views = 0;
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
    
        return view('posts.create',[
            'saves' => Saved::where('user_id', '=', auth()->user()->id)->latest()->get(),
            'views' => Recently_Viewed::where('user_id', '=', auth()->user()->id)->latest()->get(),
        ]);
    }

    public function destroy(Post $post): RedirectResponse
    {
        $post->delete();
        return redirect()->back();
    }

    public function restore(): RedirectResponse
    {
        Post::where('id', 13)->restore();
        return redirect()->back();
    }

    public function destroyImg(Request $request): JsonResponse
    {
        try {
            $media = Media::findorfail($request->input('id'));
            $media->delete();
            return response()->json(['message' => 'Deleted successfully']);

        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Delete unsuccessful'], 404);
        }
    }

    public function update(Request $request): JsonResponse{
        try {
            $post= Post::findOrFail($request->input('id'));
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
                return response()->json(['message' => 'Post updated successfully']);

        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Post not found'], 404);
        }
    }
    
}
