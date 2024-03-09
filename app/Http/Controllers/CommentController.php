<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Post;
use App\Models\User;
use App\Models\Comment;
use App\Models\Comment_Like;

class CommentController extends Controller
{
    public function comment(Request $request): JsonResponse
    {  
        try {
            $comment = new Comment();
            $comment->post_id = $request->input('post_id');
            $comment->user_id = auth()->user()->id;
            $comment->comment = $request->input('comment');
            $comment->upvotes = 0;

            if ($request->has('comment_id')) {
                $comment->parent_comment_id = $request->input('comment_id');
            };
            $comment->save();

            $commentData = [
                'user_name' => $comment->user->name,
                'created_at' => $comment->created_at->diffForHumans(),
                'comment_text' => $comment->comment,
            ];
            return response()->json(['message' => 'Successfully Commented', 'commentData' => $commentData]);
        }  catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Error Commenting on Post'], 404);
        }
    }

    public function deleteComment(Request $request): JsonResponse
    {
        try {
            $comment = Comment::findorfail($request->input('id'));
            $comment->forceDelete();
            return response()->json(['message' => 'Deleted successfully']);

        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Delete unsuccessful'], 404);
        }
    }

    public function editComment(Request $request): JsonResponse
    {  
        try {
            $comment = Comment::findOrFail($request->input('id'));
            $comment->comment = $request->input('comment');
            $comment->save();
            
            return response()->json(['message' => 'Successfully Liked']);
        }  catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Error Liking Post'], 404);
        }
    }

    public function upvote(Request $request): JsonResponse
    {  
        try {
            if ($request->has('upvote_id')){
                $comment = Comment::findOrFail($request->input('upvote_id'));
                $comment->increment('upvotes');
                $comment->save();

                $upvote = new Comment_Like();
                $upvote->comment_id = $request->input('upvote_id');
                $upvote->user_id = auth()->user()->id;
                $upvote->save();
            } else if ($request->has('downvote_id')){
                $comment = Comment::findOrFail($request->input('downvote_id'));
                $comment->decrement('upvotes');
                $comment->save();

                $commentId = $request->input('downvote_id');
                $userId = auth()->user()->id;
        
                $downvote = Comment_Like::where('comment_id', $commentId)->where('user_id', $userId)->firstOrFail();
                $downvote->delete();
            }
            
            return response()->json(['message' => 'Successfully Liked']);
        }  catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Error Liking Post'], 404);
        }
    }
}
