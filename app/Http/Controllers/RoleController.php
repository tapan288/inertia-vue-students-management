<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Permission;
use App\Http\Resources\RoleResource;
use App\Http\Requests\StoreRoleRequest;
use App\Http\Requests\UpdateRoleRequest;
use App\Http\Resources\PermissionResource;

class RoleController extends Controller
{
    public function index()
    {
        $roles = RoleResource::collection(Role::all());

        return inertia('Role/Index', [
            'roles' => $roles,
        ]);
    }

    public function create()
    {
        $permissions = PermissionResource::collection(Permission::all());

        return inertia('Role/Create', [
            'permissions' => $permissions,
        ]);
    }

    public function store(StoreRoleRequest $request)
    {
        $role = Role::create($request->validated());

        $role->permissions()->sync($request->selectedPermissions);

        return redirect()->route('roles.index');
    }

    public function edit(Role $role)
    {
        $role->load('permissions');

        return inertia('Role/Edit', [
            'role' => RoleResource::make($role),
            'permissions' => PermissionResource::collection(Permission::all())
        ]);
    }

    public function update(UpdateRoleRequest $request, Role $role)
    {
        $role->update($request->validated());

        $role->permissions()->sync($request->selectedPermissions);

        return redirect()->route('roles.index');
    }

    public function destroy(Role $role)
    {
        $role->delete();

        return redirect()->route('roles.index');
    }
}
