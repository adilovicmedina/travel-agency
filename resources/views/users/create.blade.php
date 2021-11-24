@extends('layouts.app')


@section('dashboard_content')
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content" style="margin-top: 50px;">
                        <div class="login-logo">
                            <p>TRAVEL AGENCY</p>
                        </div>
                        <div class="login-form">
                            <form method="POST" action="{{ route('users.store') }}">
                            	@csrf
                                <div class="form-group">
                                    <label>Name</label>
                                    <input class="au-input au-input--full" type="text" name="name" id="name" placeholder="name" value= "{{ old('name') }}" required>
                                    @error('name')
										<p>{{ $message }}</p>
									@enderror
                                </div>
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" type="text" name="username" id="username" placeholder="Username" value= "{{ old('username') }}" required>
                                    @error('username')
										<p>{{ $message }}</p>
									@enderror
                                </div>
                                <div class="form-group">
                    <label for="role" class="form-label">Role</label>
                    <select class="form-control" 
                        name="role" required>
                        <option value="">Select role</option>
                        @foreach($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('role'))
                        <span class="text-danger text-left">{{ $errors->first('role') }}</span>
                    @endif
                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" name="email" placeholder="Email" id="email" value= "{{ old('email') }}" required>
                                    @error('email')
										<p>{{ $message }}</p>
									@enderror
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" name="password" id="password" placeholder="Password" required>
                                    @error('password')
										<p>{{ $message }}</p>
									@enderror
                                </div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" name="aggree">Agree the terms and policy
                                    </label>
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>
                                <div class="social-login-content">
                                    <div class="social-button">
                                        <button class="au-btn au-btn--block au-btn--blue m-b-20">register with facebook</button>
                                        <button class="au-btn au-btn--block au-btn--blue2">register with twitter</button>
                                    </div>
                                </div>
                            </form>
                            <div class="register-link">
                                <p>
                                    Already have account?
                                    <a href="{{ config('app.url') }}/login">Sign In</a>
                                    @if (session()->has('success'))
									<div x-data="{ show: true }" x-init="setTimeout(() => show = false, 4000)" x-show="show" style="text-align: center; color: white; padding-top: 20px; font-weight: 700;">
										<p>{{ session('success') }}</p>
									</div>
									@endif
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection