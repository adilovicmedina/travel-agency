


@extends('layouts.app')

@section('dashboard_content')

    <div class="bg-light p-4 rounded" style="width: 70%; margin: 200px auto;">
        <h1>Show user</h1>
        <div class="lead">

        </div>

        <div class="container mt-4">
             <div>
                First name: {{ $user->first_name }}
            </div>
             <div>
                Last name: {{ $user->last_name }}
            </div>
             <div>
                Phone: {{ $user->phone }}
            </div>
            <div>
                Email: {{ $user->email }}
            </div>
            <div>
                Username: {{ $user->username }}
            </div>

            <div>
            @foreach($user->roles as $role)
                Role: {{ $role->name }}
                @endforeach
            </div>
        </div>
        <div class="mt-4">
        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-info">Edit</a>
        <a href="{{ route('users.index') }}" class="btn btn-default">Back</a>
    </div>
    </div>

@endsection
