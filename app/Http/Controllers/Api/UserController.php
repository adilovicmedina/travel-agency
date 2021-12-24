<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);

        return response()->json($users);
    }

    public function create()
    {
        return response()->json(
            [
                'roles' => Role::latest()->get(),
            ]);
    }

    public function store(User $user, Request $request)
    {
        $user = User::create([
            'first_name' => $request->first_name,
            'last_name' => $request->last_name,
            'phone' => $request->phone,
            'username' => $request->username,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        DB::table('role_user')->insert([
            'user_id' => $user->id,
            'role_id' => $request->role,
        ]);

        if ($user) {

            return response()->json(['Result' => 'User created successfully.']);

        } else {

            return response()->json(['Result' => 'Operation failed.']);

        }
    }

    public function show(User $user)
    {
        return response()->json([
            'user' => $user,
        ]);
    }

    public function edit(User $user)
    {
        return response()->json(
            ['user' => $user,
                'userRole' => $user->roles->pluck('name')->toArray(),
                'roles' => Role::latest()->get(),
            ]);
    }

    public function update(User $user, Request $request)
    {
        $updated_user = $user->update($request->all());

        DB::table('role_user')->where('user_id', $user->id)
            ->update([
                'role_id' => $request->role,
            ]);

        if ($updated_user) {

            return response()->json(['Result' => 'User updated successfully.']);

        } else {

            return response()->json(['Result' => 'Operation failed.'], 400);

        }
    }

    public function delete(User $user)
    {
        $deleted_user = $user->delete();

        if ($deleted_user) {

            return response()->json(['Result' => 'User deleted successfully.']);

        } else {

            return response()->json(['Result' => 'Operation failed.'], 400);

        }
    }
}
