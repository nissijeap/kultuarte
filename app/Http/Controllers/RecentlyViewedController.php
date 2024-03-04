<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Post;
use App\Models\User;
use App\Models\Saved;
use App\Models\Recently_viewed;

class RecentlyViewedController extends Controller
{

    public function show_view() {
        return view('posts.show_view',[
            'saves' => Saved::where('user_id', '=', auth()->user()->id)->latest()->get(),
            'views' => Recently_Viewed::where('user_id', '=', auth()->user()->id)->latest()->get(),
        ]);
    }
    
    public function viewed(Request $request): JsonResponse
    {  
        try {
            $postViewed = Post::findOrFail($request->input('post_id'));
            $postViewed->increment('views');
            $postViewed->save();
            
            $viewed = new Recently_Viewed();
            $viewed->post_id = $request->input('post_id');
            $viewed->user_id = $request->input('user_id');
            $viewed->save();
            return response()->json(['message' => 'Successfully Viewed']);
        }  catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Error Viewing'], 404);
        }
    }
}
