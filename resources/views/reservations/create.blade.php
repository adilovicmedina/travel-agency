@extends('layouts.default')


@section('content')
            <div class="col-12">
                <div class="login-wrap">
                    <div class="login-content" style="margin-top: 50px; padding: 50px 100px;">
                        <div class="login-form" style="border: 1px solid black;">
                        <h2 style="padding-left: 20px; padding-top: 20px;">RESERVATION</h2>
                            <form method="GET" action="{{ route('reservations.checkout', $tour->id) }}" style="padding: 30px;">
                            	@csrf
                                @if (!Auth::guest())
                                <div class="form-group">
                                    <label>Number of adults</label>
                                    <input
                                    class="au-input au-input--full"
                                    type="number"
                                    name="number_of_people"
                                    placeholder="Number of people"
                                    id="number_of_people"
                                    value= "{{ old('number_of_people') }}" required>
                                    @error('number_of_people')
										<p>{{ $message }}</p>
									@enderror
                                </div>
                                  <div class="form-group">
                                    <label>Number of children</label>
                                    <input class="au-input au-input--full"
                                    type="number"
                                    name="number_of_children"
                                    placeholder="Number of children"
                                    id="number_of_children"
                                    value= "{{ old('number_of_children') }}" required>
                                    @error('number_of_children')
										<p>{{ $message }}</p>
									@enderror
                                </div>
                                <div class="mb-3">
                                    <p><label for="special_wishes" class="form-label">Special</label></p>
                                     @foreach ((unserialize($tour->special_wishes)) as $key => $t)
                                    <input value="{{ $key }}"
                                            type="checkbox"
                                            name="special_wishes[]">{{ $t['name'] }} - {{$t['price'] }} <br>

                                    @endforeach
                                </div>

                    @if ($errors->has('special_wishes'))
                        <span class="text-danger text-left">{{ $errors->first('special_wishes') }}</span>
                    @endif
                </div>
                <button type='submit'>checkout</button>
                                <!-- <button class="au-btn au-btn--block au-btn--green m-b-20" type="button">checkout</button> -->
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
                                    <label>First name</label>
                                    <input class="au-input au-input--full" type="text" name="first_name" id="first_name" placeholder="First name" value= "{{ old('first_name') }}" required>
                                    @error('first_name')
										<p>{{ $message }}</p>
									@enderror
                                </div>
                                 <div class="form-group">
                                    <label>Last name</label>
                                    <input class="au-input au-input--full" type="text" name="last_name" id="last_name" placeholder="Last name" value= "{{ old('last_name') }}" required>
                                    @error('last_name')
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
                                    <label>Phone</label>
                                    <input class="au-input au-input--full" type="number" name="phone" placeholder="phone" id="phone" value= "{{ old('phone') }}" required>
                                    @error('phone')
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
                                    <label>Adults</label>
                                    <input class="au-input au-input--full" type="number" name="number_of_people" placeholder="Number of people" id="number_of_people" value= "{{ old('number_of_people') }}" required>
                                    @error('number_of_people')
										<p>{{ $message }}</p>
									@enderror
                                </div>
                                 <div class="form-group">
                                    <label>Children</label>
                                    <input class="au-input au-input--full" type="number" name="number_of_children" placeholder="Number of children" id="number_of_children" value= "{{ old('number_of_children') }}" required>
                                    @error('number_of_children')
										<p>{{ $message }}</p>
									@enderror
                                </div>
                                 <div class="mb-3">
                    <label for="special_wishes" class="form-label">Special</label>
                    <input value="{{ old('special_wishes') }}"
                        type="number"
                        class="form-control"
                        name="special_wishes"
                        placeholder="special_wishes" required>

                    @if ($errors->has('special_wishes'))
                        <span class="text-danger text-left">{{ $errors->first('special_wishes') }}</span>
                    @endif
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
