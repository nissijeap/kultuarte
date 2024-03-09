<?php

namespace App\Http\Controllers;

use App\Models\ToDo;
use Illuminate\Http\Request;

class ToDoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $toDos = ToDo::all();
        return view('toDos.index', compact('toDos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
        public function store(Request $request)
        {
            try {
                $validatedData = $request->validate([
                    'title' => 'required|string|max:255',
                    'description' => 'nullable|string|max:255',
                    'status' => 'nullable|string|in:pending,completed' // Allow status to be nullable
                ]);

                // Set default value for status if not provided
                $validatedData['status'] = $request->input('status', 'pending');

                ToDo::create($validatedData);

                return redirect()->route('toDos.index')->with('success', 'New task added successfully.');
            } catch (\Exception $e) {
                // If an exception occurs, redirect back with error message
                return redirect()->back()->withInput()->with('error', 'Task could not be added.')->with('toastr', 'error');
            }
        }


    /**
     * Display the specified resource.
     */
    public function show(ToDo $toDo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ToDo $toDo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, ToDo $toDo)
    {
        $toDo->update(['status' => $request->input('status')]);

        return response()->json(['message' => 'Task status updated successfully']);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $toDo = ToDo::findOrFail($id);
        $toDo->delete();

        // Optionally, you can redirect the user back to the permissions list
        return redirect()->route('toDos.index')->with('success', 'Task deleted successfully');
    }
}
