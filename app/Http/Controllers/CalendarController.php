<?php

namespace App\Http\Controllers;

use App\Models\Calendar; 
use App\Models\Category; 
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $calendars = Calendar::all();
        $events = [];
        foreach ($calendars as $calendar) {
            $events[] = [
                'id' => $calendar->id,
                'title' => $calendar->title,
                'start' => substr($calendar->start_date, 0, 10). 'T' . $calendar->start_time,
                'end' => substr($calendar->end_date, 0, 10). 'T' . $calendar->end_time,
            ];
        }        
    
        $currentCalendars = Calendar::where('status', 'current')->get();
        $pastCalendars = Calendar::where('status', 'past')->get();
        $upcomingCalendars = Calendar::where('status', 'upcoming')->get();

        $categories = Category::all();

        // return response()->json($events);
        return view('calendars.index', compact('events', 'categories', 'calendars', 'currentCalendars', 'pastCalendars', 'upcomingCalendars'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $calendars = Calendar::all();
        $categories = Category::all();

        return view('calendars.create', compact('calendars', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    try {
    // Validate the incoming request data
    $validatedData = $request->validate([
        'category_id' => 'required|exists:categories,id',
        'title' => 'required|string|max:255',
        'description' => 'nullable|string',
        'start_date' => 'required|date',
        'start_time' => 'required|date_format:H:i',
        'end_date' => 'required|date|after_or_equal:start_date',
        'end_time' => 'nullable|date_format:H:i|after_or_equal:start_time', 
    ]);

      // Determine status based on start date
      $status = 'upcoming';
      if ($validatedData['start_date'] == now()->format('Y-m-d')) {
          $status = 'current';
      } elseif ($validatedData['start_date'] < now()->format('Y-m-d')) {
          $status = 'past';
      }

    // Create a new calendar event
    Calendar::create(array_merge($validatedData, ['status' => $status]));

        // Redirect to the permissions index page with success message
        return redirect()->route('calendars.index')->with('success', 'New event added successfully.');
    } catch (\Exception $e) {
        // If an exception occurs, redirect back with error message
        return redirect()->back()->withInput()->with('error', 'Failed to store events: ' . $e->getMessage());
    }
}

    
    /**
     * Display the specified resource.
     */
    public function show(Calendar $calendar)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Calendar $calendar)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Calendar $calendar)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Calendar $calendar)
    {
        //
    }
}
