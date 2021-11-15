@extends('layouts.default')

@section('content')

	<main class="form-center">
		<h2>Register</h2>
		<form method="POST" action="{{ config('app.url') }}/register">
			@csrf
			<div>
				<label for="name">Name</label>
				<input type="text" name="name" id="name" value= "{{ old('name') }}" required>
				@error('name')
					<p style = "color: red; text-align: center;">{{ $message }}</p>
				@enderror
			</div>
			<div>
				<label for="username">Username</label>
				<input type="text" name="username" id="username" value= "{{ old('username') }}" required>
				@error('username')
					<p style = "color: red; text-align: center;">{{ $message }}</p>
				@enderror
			</div>
			<div>
				<label for="email">Email</label>
				<input type="email" name="email" id="email" value= "{{ old('email') }}" required>
				@error('email')
					<p style = "color: red; text-align: center;">{{ $message }}</p>
				@enderror
			</div>
			<div>
				<label for="password">Password</label>
				<input type="password" name="password" id="password" required>
				@error('password')
					<p style = "color: red; text-align: center;">{{ $message }}</p>
				@enderror
			</div>
			<div>
				<button type="submit" class="form-submit">Submit</button>
			</div>
		</form>
	</main>

@endsection