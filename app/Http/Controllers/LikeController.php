<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Post;
use App\Models\User;
use App\Models\Like;


class LikeController extends Controller
{
    public function like(Request $request): JsonResponse
    {  
        try {
            $like = new Like();
            $like->post_id = $request->input('post_id');
            $like->user_id = $request->input('user_id');
            $like->save();
            return response()->json(['message' => 'Successfully Liked']);
        }  catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Error Liking Post'], 404);
        }
    }

    public function unlike(Request $request): JsonResponse
    {  
        try {
            $postId = $request->input('post_id');
            $userId = $request->input('user_id');
    
            $unlike = Like::where('post_id', $postId)->where('user_id', $userId)->firstOrFail();
            $unlike->delete();
    
            return response()->json(['message' => 'Successfully Unliked']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Error Unliking Post'], 404);
        }
    }
    
}
