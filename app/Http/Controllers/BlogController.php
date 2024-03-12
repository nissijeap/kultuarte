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
use App\Models\Blog;
use Illuminate\View\View;

class BlogController extends Controller
{
    //use SoftDeletes
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-blog|edit-blog|delete-blog', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-blog', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-blog', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-blog', ['only' => ['destroy']]);
    }

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
        return view ('blogs.userShow',[
            'blog' => Blog_post::where('id', '=', $blog)->first(),
        ]);
    }

    public function index()
    {
        $blogs = Blog::all();

        return view('blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $blogs = Blog::all();
        return view('blogs.create', compact('blogs'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $blog = new Blog();
        $blog->user_id = auth()->user()->id;
        $blog->category_id = 2; 
        $blog->title = $request->input('title');
        $blog->culture = $request->input('culture');
        $blog->people = $request->input('people');
        $blog->language = $request->input('language');
        $blog->food_drink = $request->input('food_drink');
        $blog->music = $request->input('music');
        $blog->arts = $request->input('arts');
        $blog->location = $request->input('location');
        $blog->religion = $request->input('religion');
        $blog->politics = $request->input('politics');
        $blog->events = $request->input('events');
        $blog->history = $request->input('history');
        $blog->views = 0; 
        $blog->save();

        // Redirect to the desired page after successful submission
        return redirect()->route('blogs.index')->with('success', 'Blog created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $blog = Blog::findOrFail($id);

        return view('blogs.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */

     public function edit($id)
     {
         $blog = Blog::findOrFail($id);

         return view('blogs.edit', compact('blog'));
     }

    /**
     * Update the specified resource in storage.
     */

     public function update(Request $request, $id)
    {
        try {
            $blog = Blog::findOrFail($id);

            $validatedData = $request->validate([
                'title' => 'nullable|string|max:255',
                'culture' => 'nullable|string',
                'people' => 'nullable|string',
                'language' => 'nullable|string',
                'food_drink' => 'nullable|string',
                'music' => 'nullable|string',
                'arts' => 'nullable|string',
                'location' => 'nullable|string',
                'religion' => 'nullable|string',
                'politics' => 'nullable|string',
                'events' => 'nullable|string',
                'history' => 'nullable|string',
            ]);

            $blog->update($validatedData);

            return redirect()->route('blogs.index')->with('success', 'Blog updated successfully');
        } catch (\Exception $e) {
            dd($e->getMessage()); 
            return back()->withInput()->with('error', 'Error updating blog');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);
        $blog->delete();

        // Optionally, you can redirect the user back to the permissions list
        return redirect()->route('blogs.index')->with('success', 'Blog deleted successfully');
    }
}
