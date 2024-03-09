<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class guestController extends Controller
{
    // about page starts here

    public function aboutView(){ return view('guest.about'); }
    public function eventView(){ return view('guest.events'); }

    // about page ends here


    // contact us page starts here

    public function contactView(){ return view('guest.contact'); }

    // contact us page ends here


    // arts page starts here

    public function publicInstallation(){ return view('guest.arts.installation'); }

    public function visualArtwork(){ return view('guest.arts.artwork'); }

    public function visualArtists(){ return view('guest.arts.artists'); }

    public function upcomingEvents(){ return view('guest.arts.upcoming_events'); }

    public function artOrganization(){ return view('guest.arts.organizations'); }

    // arts page ends here


    // culture page starts here

    public function people(){ return view('guest.culture.people'); }

    public function places(){ return view('guest.culture.places'); }

    public function culturalEvents(){ return view('guest.culture.cultural_events'); }

    public function annualEvents(){ return view('guest.culture.annual_events'); }

    // culture page ends here
}
