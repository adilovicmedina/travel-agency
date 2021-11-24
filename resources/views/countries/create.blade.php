@extends('layouts.app')

@section('dashboard_content')

<div class="bg-light p-4 rounded" style="width: 70%; margin: 120px auto;" >
    <h2>Add new country</h2>
    <div class="lead">
        Add new country.
    </div>

    <div class="container mt-4">

        <form method="POST" action="{{ route('countries.store') }}">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input type="text" class="form-control" name="name" placeholder="name" required>

                @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label for="about" class="form-label">About</label>
                <input type="text" class="form-control" name="about" placeholder="about" required>

                @if ($errors->has('about'))
                <span class="text-danger text-left">{{ $errors->first('about') }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input class="form-control" name="photo" type="text" placeholder="photo" required>{{ old('photo') }}

                @if ($errors->has('photo'))
                <span class="text-danger text-left">{{ $errors->first('photo') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="continent_id" class="form-label">Continent</label>
                <input class="form-control" name="continent_id" type="text" placeholder="continent_id" required>

                @if ($errors->has('continent_id'))
                <span class="text-danger text-left">{{ $errors->first('continent_id') }}</span>
                @endif
            </div>

            <button type="submit" class="btn btn-primary">Save</button>
            <a href="{{ route('countries.index') }}" class="btn btn-default">Back</a>
        </form>
    </div>

</div>

@endsection