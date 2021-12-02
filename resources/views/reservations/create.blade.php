@extends('layouts.default')


@section('content')
            <div class="col-12">
                <div class="login-wrap">
                    <div class="login-content" style="margin-top: 50px; padding: 50px 100px;">
                        <div class="login-form" style="border: 1px solid black;">
                        <h2 style="padding-left: 20px; padding-top: 20px;">RESERVATION</h2>
                            <form method="POST" action="{{ route('reservations.store', $tour->id) }}" style="padding: 30px;">
                            	@csrf
                                @if (!Auth::guest())
                                <div class="form-group">
                                    <label>Number of people</label>
                                    <input class="au-input au-input--full" type="number" name="number_of_people" placeholder="Number of people" id="number_of_people" value= "{{ old('number_of_people') }}" required>
                                    @error('number_of_people')
										<p>{{ $message }}</p>
									@enderror
                                </div>

                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">RESERVE</button>
                            </form>
                            <div class="register-link" style="padding: 30px;">
                                <p>
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
                @else
                       <div class="login-wrap">
                    <div class="login-content" style="margin-top: 50px; padding: 50px 100px;">
                        <div class="login-form" style="border: 1px solid black;">
                        <h2 style="padding-left: 20px; padding-top: 20px;">RESERVATION</h2>
                            <form method="POST" action="{{ route('reservations.store', $tour->id) }}" style="padding: 30px;">
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
                                <div class="form-group">
                                    <label>Number of people</label>
                                    <input class="au-input au-input--full" type="number" name="number_of_people" placeholder="Number of people" id="number_of_people" value= "{{ old('number_of_people') }}" required>
                                    @error('number_of_people')
										<p>{{ $message }}</p>
									@enderror
                                </div>

                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">RESERVE</button>
                            </form>
                            <div class="register-link" style="padding: 30px;">
                                <p>
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
                @endif
            </div>
@endsection
