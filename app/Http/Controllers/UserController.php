<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Models\User;
use DB;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);

        return view('users.index', compact('users'));
    }

    public function create()
    {

        return view('users.create',
            [
                'roles' => Role::latest()->get(),
            ]);
    }

    public function store(User $user, StoreUserRequest $request)
    {
        $user = User::create([
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);
        DB::table('role_user')->insert([
            'user_id' => $user->id,
            'role_id' => $request->role,
        ]
        );

        return redirect()->route('users.index')
            ->withSuccess(__('User created successfully.'));
    }

    public function show(User $user)
    {
        return view('users.show', [
            'user' => $user,
        ]);
    }

    public function edit(User $user)
    {
        return view('users.edit',
            ['user' => $user,
                'userRole' => $user->roles->pluck('name')->toArray(),
                'roles' => Role::latest()->get(),
            ]);
    }

    public function update(User $user, UpdateUserRequest $request)
    {
        $user->update($request->validated());

        DB::table('role_user')->where('user_id', $user->id)
            ->update([
                'role_id' => $request->role,
            ]);

        return redirect()->route('users.index')
            ->withSuccess(__('User updated successfully.'));
    }

    public function delete(User $user)
    {
        $user->delete();

        return redirect()->route('users.index')
            ->withSuccess(__('User deleted successfully.'));
    }

}
