<?php

namespace App\Http\Controllers;

use Spatie\Permission\Models\Permission;
use Illuminate\Http\Request;

class PermissionController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-permission|edit-permission|delete-permission', ['only' => ['index', 'show']]);
        $this->middleware('permission:create-permission', ['only' => ['create', 'store']]);
        $this->middleware('permission:edit-permission', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-permission', ['only' => ['destroy']]);
    }

    public function index()
    {
        $permissions = Permission::all();

        return view('permissions.index', compact('permissions'));
    }

    public function create()
    {
        $permissions = Permission::all();
        return view('permissions.create', compact('permissions'));
    }

    public function store(Request $request)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'permissions.*.name' => 'required|string|max:255', // Validate each permission name field in the array
            ]);

            // Create permissions
            foreach ($validatedData['permissions'] as $permissionData) {
                Permission::create([
                    'name' => $permissionData['name'],
                    'guard_name' => 'web', // Assuming 'web' is your guard name
                ]);
            }

            // Redirect to the permissions index page with success message
            return redirect()->route('permissions.index')->with('success', 'New permissions added successfully.');
        } catch (\Exception $e) {
            // If an exception occurs, redirect back with error message
            return redirect()->back()->withInput()->with('error', 'Failed to store permissions: ' . $e->getMessage());
        }
    }


    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        // You can add your logic here to retrieve the permission data and pass it to the view
        return view('permissions.edit', compact('permission'));
    }

    public function update(Request $request, $id)
    {
        try {
            // Validate the incoming request data
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
            ]);
        
            // Find the permission by ID
            $permission = Permission::findOrFail($id);
    
            // Update the permission's name
            $permission->update([
                'name' => $validatedData['name'],
                'guard_name' => 'web',
            ]);
    
            // Redirect to the permissions index page with success message
            return redirect()->route('permissions.index')->with('success', 'Permission updated successfully.');
        } catch (\Exception $e) {
            // If an exception occurs, redirect back with error message using toastr
            return redirect()->back()->withInput()->with('error', 'Permission already exists.')->with('toastr', 'error');
        }
    }
    

    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        // Optionally, you can redirect the user back to the permissions list
        return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully');
    }

}