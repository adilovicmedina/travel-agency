<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(5);
        return response()->json(['roles' => $roles, 'i' => ($request->input('page', 1) - 1) * 5]);
    }

    public function create()
    {
        $roles = Role::get();
        return response()->json($roles);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
        ]);

        $role = Role::create(['name' => $request->get('name')]);

        if ($role) {
            return response()->json(['Result' => 'Role created successfully.']);

        } else {
            return response()->json(['Result' => 'Operation failed.']);
        }

    }

    public function show(Role $role)
    {
        return $role;
    }

    public function edit(Role $role)
    {
        return $role;
    }

    public function update(Role $role, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $updated_role = $role->update($request->only('name'));

        if ($updated_role) {
            return response()->json(['Result' => 'Role updated successfully.']);

        } else {
            return response()->json(['Result' => 'Operation failed.']);
        }

    }

    public function destroy(Role $role)
    {
        $deleted_role = $role->delete();

        if ($deleted_role) {
            return response()->json(['Result' => 'Role deleted successfully.']);

        } else {
            return response()->json(['Result' => 'Operation failed.']);

        }
    }
}
