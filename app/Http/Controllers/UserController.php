<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * Instantiate a new UserController instance.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-user|edit-user|delete-user', ['only' => ['index','show', 'test', 'pending', 'approved', 'denied']]);
        $this->middleware('permission:create-user', ['only' => ['create','store']]);
        $this->middleware('permission:edit-user', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-user', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $users = User::all();
        
        return view('users.index', compact('users'));
    }

    public function pending(): View
    {
        $users = User::where('is_approved', 0)->get();
        
        return view('users.pending', compact('users'));
    }

    public function approved(): View
    {
        $users = User::where('is_approved', 1)->get();
        
        return view('users.approved', compact('users'));
    }

    public function denied(): View
    {
        $users = User::where('is_approved', 2)->get();
        
        return view('users.denied', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('users.create', [
            'roles' => Role::pluck('name')->all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request): RedirectResponse
    {
        try {
            $input = $request->all();
            $input['password'] = Hash::make($request->password);

            $user = User::create($input);
            $user->assignRole($request->roles);

             // Store user photo
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $photoName = 'photo_' . time() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('images/photos/'), $photoName);
                $user->photo = $photoName;
                $user->save();
            }

        // Redirect to the permissions index page with success message
            return redirect()->route('users.index')->with('success', 'New user added successfully.');
        } catch (\Exception $e) {
            // If an exception occurs, redirect back with error message
            return redirect()->back()->withInput()->with('error', 'Failed to store user: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id): View
    {
        $user = User::findOrFail($id);

        return view('users.show', compact('user'));
    }   

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user): View
    {
        // Check Only Super Admin can update his own Profile
        if ($user->hasRole('Super Admin')){
            if($user->id != auth()->user()->id){
                abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS');
            }
        }

        return view('users.edit', [
            'user' => $user,
            'roles' => Role::pluck('name')->all(),
            'userRoles' => $user->roles->pluck('name')->all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user): RedirectResponse
    {
        try {
            $input = $request->except('password'); // Exclude password from input
            
            // Check if a new photo is uploaded
            if ($request->hasFile('photo')) {
                // Delete old photo if it exists
                if ($user->photo) {
                    $oldPhotoPath = public_path('images/photos/') . $user->photo;
                    if (file_exists($oldPhotoPath)) {
                        unlink($oldPhotoPath);
                    }
                }
                
                // Upload new photo
                $photo = $request->file('photo');
                $photoName = 'photo_' . time() . '.' . $photo->getClientOriginalExtension();
                $photo->move(public_path('images/photos/'), $photoName);
                $input['photo'] = $photoName; // Update input with new photo name
            }
            
            // Update user details
            if (!empty($request->password)) {
                $input['password'] = Hash::make($request->password);
            }
            $user->update($input);

            // Sync user roles
            $user->syncRoles($request->roles);

            // Redirect to the users index page with success message
            return redirect()->route('users.index')->with('success', 'User updated successfully.');
        } catch (\Exception $e) {
            // If an exception occurs, redirect back with error message
            return redirect()->back()->withInput()->with('error', 'Oops! Something went wrong.');
        }
    }

    public function approve(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->is_approved = 1; // Set approval status to 1 (approved)
            $user->approved_at = Carbon::now(); // Set approval date to current time
            $user->save();
            
            return redirect()->back()->with('success', 'User approved successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to approve user.');
        }
    }
    
    public function deny(Request $request, $id)
    {
        try {
            $user = User::findOrFail($id);
            $user->is_approved = 2; // Set approval status to 2 (denied)
            $user->approved_at = Carbon::now(); // Set approval date to current time
            $user->save();
            
            return redirect()->back()->with('success', 'User denied successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to deny user.');
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): RedirectResponse
    {
        // About if user is Super Admin or User ID belongs to Auth User
        if ($user->hasRole('Super Admin') || $user->id == auth()->user()->id)
        {
            abort(403, 'USER DOES NOT HAVE THE RIGHT PERMISSIONS');
        }

        $user->syncRoles([]);
        $user->delete();
        return redirect()->route('users.index')
                ->withSuccess('User is deleted successfully.');
    }
    
    public function isSuperAdmin()
    {
        // Check if the user has the 'superadmin' role
        return $this->hasRole('Super Admin');
    }
}