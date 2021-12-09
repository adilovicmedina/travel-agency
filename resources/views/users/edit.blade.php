

@extends('layouts.app')



@section('dashboard_content')
    <div class="bg-light p-4 rounded"  style="width: 70%; margin: 120px auto;">
        <h1>Update user</h1>
        <div class="lead">

        </div>

        <div class="container mt-4">
            <form method="post" action="{{ route('users.update', $user->id) }}">
                @method('patch')
                @csrf
                 <div class="form-group">
                    <label>First name</label>
                    <input value="{{ $user->first_name }}"
                    class="au-input au-input--full" type="text" name="first_name" id="first_name" placeholder="First name" value= "{{ old('first_name') }}" required>
                    @error('first_name')
					    <p>{{ $message }}</p>
					@enderror
                </div>
                <div class="form-group">
                    <label>Last name</label>
                    <input value="{{ $user->last_name }}"
                    class="au-input au-input--full" type="text" name="last_name" id="last_name" placeholder="Last name" value= "{{ old('last_name') }}" required>
                    @error('last_name')
						<p>{{ $message }}</p>
					@enderror
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input value="{{ $user->email }}"
                        type="email"
                        class="form-control"
                        name="email"
                        placeholder="Email address" required>
                    @if ($errors->has('email'))
                        <span class="text-danger text-left">{{ $errors->first('email') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="username" class="form-label">Username</label>
                    <input value="{{ $user->username }}"
                        type="text"
                        class="form-control"
                        name="username"
                        placeholder="Username" required>
                    @if ($errors->has('username'))
                        <span class="text-danger text-left">{{ $errors->first('username') }}</span>
                    @endif
                </div>
                <div class="form-group">
                    <label>Phone</label>
                    <input value="{{ $user->phone }}"
                    class="au-input au-input--full" type="number" name="phone" id="phone" placeholder="Phone" value= "{{ old('phone') }}" required>
                    @error('phone')
						<p>{{ $message }}</p>
					@enderror
                </div>
                <div class="mb-3">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-control"
                        name="role" required>
                        <option value="">Select role</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}"
                                {{ in_array($role->name, $userRole)
                                    ? 'selected'
                                    : '' }}>{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('role'))
                        <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Update user</button>
                <a href="{{ route('users.index') }}" class="btn btn-default">Cancel</button>
            </form>
        </div>

    </div>
@endsection
