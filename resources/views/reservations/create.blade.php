@extends('layouts.default')


@section('content')
            <div class="col-12">
                <div class="login-wrap">
                    <div class="login-content" style="margin-top: 50px; padding: 50px 100px;">
                        <div class="login-form" style="border: 1px solid black;">
                            <form method="POST" action="{{ route('reservations.store', $tour->id) }}" style="padding: 30px;">
                            	@csrf
                                @if (!Auth::guest())
                                <div class="form-group">
                                    <label>Number of people</label>
                                    <input class="au-input au-input--full" type="number" name="number_of_people" placeholder="number of people" id="number_of_people" value= "{{ old('number_of_people') }}" required>
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
                    <p style="font-weight: 700; ">YOU MUST BE LOGIN</p>
                    <p>Don't have an account?<a href="{{ config('app.url') }}/register" style="font-weight: 700;  list-style: none; color: red; "> Register here</a></p>
                    <p>Already have an account? <a href="{{ config('app.url') }}/login" style="font-weight: 700;  list-style: none; color: green; ">Log in here. </a></p>
                @endif
            </div>
@endsection
