<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class guestController extends Controller
{
    // about page starts here

    public function aboutView(){ return view('guest.about'); }

    // about page ends here
}
