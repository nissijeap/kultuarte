<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Post;
use App\Models\User;
use App\Models\Saved;
use App\Models\Recently_viewed;

class SaveController extends Controller
{
    public function show_saved() {
        return view('posts.show_saved',[
            'saves' => Saved::where('user_id', '=', auth()->user()->id)->latest()->get(),
            'views' => Recently_Viewed::where('user_id', '=', auth()->user()->id)->latest()->get(),
        ]);
    }

    public function save(Request $request): JsonResponse
    {  
        try {
            $save = new Saved();
            $save->post_id = $request->input('post_id');
            $save->user_id = $request->input('user_id');
            $save->save();
            return response()->json(['message' => 'Successfully Saved']);
        }  catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Error Saving'], 404);
        }
    }

    public function unsave(Request $request): JsonResponse
    {  
        try {
            $postId = $request->input('post_id');
            $userId = $request->input('user_id');
            $unsave = Saved::where('post_id', $postId)->where('user_id', $userId)->firstOrFail();
            $unsave->delete();
            return response()->json(['message' => 'Successfully Unsaved']);
        }  catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Error Unsaving'], 404);
        }
    }
}
