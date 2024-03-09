<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-category|edit-category|delete-category', ['only' => ['index']]);
        $this->middleware('permission:create-category', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-category', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-category', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();
        return view('categories.create', compact('categories'));
    }

    public function store(Request $request)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'categories.*.name' => 'required|string|max:255', // Validate each permission name field in the array
            ]);

            // Create permissions
            foreach ($validatedData['categories'] as $categoryData) {
                Category::create([
                    'name' => $categoryData['name'],
                ]);
            }

            // Redirect to the permissions index page with success message
            return redirect()->route('categories.index')->with('success', 'New categories added successfully.');
        } catch (\Exception $e) {
            // If an exception occurs, redirect back with error message
            return redirect()->back()->withInput()->with('error', 'Category already exists.')->with('toastr', 'error');
        }
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        // You can add your logic here to retrieve the permission data and pass it to the view
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
            ]);
        
            // Find the permission by ID
            $category = Category::findOrFail($id);
    
            // Update the permission's name
            $category->update([
                'name' => $validatedData['name'],
            ]);
    
            // Redirect to the permissions index page with success message
            return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
        } catch (\Exception $e) {
            // If an exception occurs, redirect back with error message using toastr
            return redirect()->back()->withInput()->with('error', 'Category already exists.')->with('toastr', 'error');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        // Optionally, you can redirect the user back to the permissions list
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully');
    }

}
