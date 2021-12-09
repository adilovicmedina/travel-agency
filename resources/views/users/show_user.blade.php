@extends('layouts.default')

@section('content')

    <div class="bg-light p-4 rounded" style="width: 70%; margin: 50px auto;">
        <h1>Your profile</h1>

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
         <p><a href="{{ route('reservations.index', Auth::id()) }}" class="btn btn-primary btn-sm">See your reservation</a></p>
    </div>
    </div>

@endsection
