<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:create-role|edit-role|delete-role', ['only' => ['index','show']]);
        $this->middleware('permission:create-role', ['only' => ['create','store']]);
        $this->middleware('permission:edit-role', ['only' => ['edit','update']]);
        $this->middleware('permission:delete-role', ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $user = Auth::user();
        // $allRoles = Role::all();
        // $roles = Role::orderBy('id','DESC')->paginate(3);
        $roles = Role::all();

        return view('roles.index', compact('roles', 'user'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $user = Auth::user();
        $permissions = Permission::get();
        $roles = Role::all();

        return view('roles.create', compact('permissions', 'user', 'roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRoleRequest $request): RedirectResponse
    {
        $role = Role::create(['name' => $request->name]);

        $permissions = Permission::whereIn('id', $request->permissions)->get(['name'])->toArray();
        
        $role->syncPermissions($permissions);

        return redirect()->route('roles.index')
                ->withSuccess('New role is added successfully.');
    }

    /**
     * Display the specified resource.
     */

    public function show(Role $role): View
    {
        $rolePermissions = Permission::join("role_has_permissions","permission_id","=","id")
            ->where("role_id",$role->id)
            ->select('name')
            ->get();

        $user = Auth::user();
        $roles = Role::all();

        return view('roles.show', [
            'role' => $role,
            'rolePermissions' => $rolePermissions,
            'user' => $user,
            'roles' => $roles,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role): View
    {
        if($role->name=='Super Admin'){
            abort(403, 'SUPER ADMIN ROLE CAN NOT BE EDITED');
        }

        $rolePermissions = DB::table("role_has_permissions")->where("role_id",$role->id)
            ->pluck('permission_id')
            ->all();

        $user = Auth::user();
        $roles = Role::all();

        return view('roles.edit', [
            'role' => $role,
            'permissions' => Permission::get(),
            'rolePermissions' => $rolePermissions,
            'user' => $user,
            'roles' => $roles,

        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateRoleRequest $request, Role $role): RedirectResponse
    {
        try {
            $input = $request->only('name');

            $role->update($input);

            $permissions = Permission::whereIn('id', $request->permissions)->get(['name'])->toArray();

            $role->syncPermissions($permissions);

            Alert::success('Success!', 'You are successfully logged in.')->autoclose(3000);
            return redirect()->route('roles.index');
        } catch (\Exception $e) {
            Alert::error('Error', 'Failed to update role.');
            return redirect()->back()->with('error', 'Failed to update role.')->withInput();
        }
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role): RedirectResponse
    {
        if($role->name=='Super Admin'){
            abort(403, 'SUPER ADMIN ROLE CAN NOT BE DELETED');
        }
        if(auth()->user()->hasRole($role->name)){
            abort(403, 'CAN NOT DELETE SELF ASSIGNED ROLE');
        }
        $role->delete();
        return redirect()->route('roles.index')
                ->withSuccess('Role is deleted successfully.');
    }
}