<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Media;
use App\Models\Saved;
use App\Models\Recently_Viewed;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(auth()->user()->hasRole('Super Admin')){
            return view('posts.home');
        } else {
            return view('home', [
                'posts' => Post::latest()->get(),
                'medias' => Media::latest()->get(),
                'saves' => Saved::where('user_id', '=', auth()->user()->id)->latest()->get(),
                'views' => Recently_Viewed::where('user_id', '=', auth()->user()->id)->latest()->get(),
            ]);
        }
        
    }
}
