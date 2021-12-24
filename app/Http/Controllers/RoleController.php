<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index(Request $request)
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(5);
        return view('users.create', compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    public function create()
    {
        $roles = Role::get();
        return view('roles.create', compact('roles'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
        ]);

        $role = Role::create(['name' => $request->get('name')]);

        if ($role) {
            return redirect()->route('roles.index')
                ->withSuccess(__('Role created successfully.'));

        } else {
            return redirect()->back()
                ->with('error', "Role didn't created.");

        }

    }

    public function show(Role $role)
    {
        $role = $role;
        return view('roles.show', compact('role'));
    }

    public function edit(Role $role)
    {
        $role = $role;
        return view('roles.edit', compact('role'));
    }

    public function update(Role $role, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
        ]);

        $updated_role = $role->update($request->only('name'));

        if ($updated_role) {
            return redirect()->route('roles.index')
                ->withSuccess(__('Role updated successfully.'));

        } else {
            return redirect()->back()
                ->with('error', "Role didn't updated.");
        }

    }

    public function destroy(Role $role)
    {
        $deleted_role = $role->delete();

        if ($deleted_role) {
            return redirect()->route('roles.index')
                ->withSuccess(__('Role deleted successfully.'));

        } else {
            return redirect()->back()
                ->with('error', "Role didn't deleted.");

        }
    }
}
