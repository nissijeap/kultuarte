<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\View\View;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-blog|edit-blog|delete-blog', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-blog', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-blog', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-blog', ['only' => ['destroy']]);
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
