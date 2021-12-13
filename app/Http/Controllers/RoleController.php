<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function __construct()
    {

    }

    public function index(Request $request)
    {
        $roles = Role::orderBy('id', 'DESC')->paginate(5);
        return view('users.create', compact('roles'))
            ->with('i', ($request->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::get();
        return view('roles.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Role $role)
    {
        $role = $role;
        return view('roles.show', compact('role'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $role = $role;
        return view('roles.edit', compact('role'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
