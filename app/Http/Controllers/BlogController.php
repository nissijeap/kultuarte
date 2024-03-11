<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\JsonResponse;
//use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Like;
use App\Models\Media;
use App\Models\Saved;
use App\Models\Recently_Viewed;
use App\Models\Blog_Post;
use App\Models\Blog_People;
use App\Models\Blog_Language;
use App\Models\Blog_Arts_Crafts;
use App\Models\Blog_Food_Drink;
use App\Models\Blog_Music_Dance;
use App\Models\Blog_Location;
use App\Models\Blog_Religion;
use App\Models\Blog_Politic;
use App\Models\Blog_Event;
use App\Models\Blog_History;

class BlogController extends Controller
{
    //use SoftDeletes
    public function blogs(){
        return view('blogs.blogs', [
            'blogs' => Blog_Post::latest()->get(),
            'saves' => Saved::where('user_id', '=', auth()->user()->id)->latest()->get(),
            'views' => Recently_Viewed::where('user_id', '=', auth()->user()->id)->latest()->get(),
        ]);
    }

    public function storeBlog(Request $request){
        try{
            $blog = new Blog_Post();
            $blog->category_id = 1;
            $blog->title = $request->input('title');
            $blog->user_id = auth()->user()->id;
            $blog->ethnic_group = $request->input('ethnicity');
            $blog->save();
            $categories = $request->input('categories');
            $content = $request->input('additionalInfoMap');
            foreach($categories as $category){
                if($category == 1 && isset($content['people'])){
                    $people = new Blog_People();
                    $people->blog_post = $blog->id;
                    $people->content = $content['people'];
                    $people->save();
                } else if($category == 2 && isset($content['language'])){
                    $language = new Blog_Language();
                    $language->blog_post = $blog->id;
                    $language->content = $content['language'];
                    $language->save();
                } else if($category == 3 && isset($content['food_drink'])){
                    $food_drink = new Blog_Food_Drink();
                    $food_drink->blog_post = $blog->id;
                    $food_drink->content = $content['food_drink'];
                    $food_drink->save();
                } else if($category == 4 && isset($content['music_dances'])){
                    $music_dances = new Blog_Music_Dance();
                    $music_dances->blog_post = $blog->id;
                    $music_dances->content = $content['music_dances'];
                    $music_dances->save();
                } else if($category == 5 && isset($content['arts_crafts'])){
                    $arts_crafts = new Blog_Arts_Crafts();
                    $arts_crafts->blog_post = $blog->id;
                    $arts_crafts->content = $content['arts_crafts'];
                    $arts_crafts->save();
                } else if($category == 6 && isset($content['location'])){
                    $location = new Blog_Location();
                    $location->blog_post = $blog->id;
                    $location->content = $content['location'];
                    $location->save();
                } else if($category == 7 && isset($content['religion'])){
                    $religion = new Blog_Religion();
                    $religion->blog_post = $blog->id;
                    $religion->content = $content['religion'];
                    $religion->save();
                } else if($category == 8 && isset($content['politics'])){
                    $politics = new Blog_Politic();
                    $politics->blog_post = $blog->id;
                    $politics->content = $content['politics'];
                    $politics->save();
                } else if($category == 9 && isset($content['events'])){
                    $events = new Blog_Event();
                    $events->blog_post = $blog->id;
                    $events->content = $content['events'];
                    $events->save();
                } else if($category == 10 && isset($content['history'])){
                    $history = new Blog_History();
                    $history->blog_post = $blog->id;
                    $history->content = $content['history'];
                    $history->save();
                }
            }
            return response()->json(['message' => 'Posted successfully']);
        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Postunsuccessful'], 404);
        }
    }

    public function showBlogs($blog){
        return view ('blogs.show',[
            'blog' => Blog_post::where('id', '=', $blog)->first(),
        ]);
    }
}
