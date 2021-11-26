@extends('layouts.app')

@section('dashboard_content')
<div class="bg-light p-4 rounded" style="width: 70%; margin: 120px auto;">
    <h2>Update post</h2>


    <div class="container mt-4">

        <form method="POST" action="{{ route('countries.update', $country->id) }}">
            @method('patch')
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name</label>
                <input value="{{ $country->name }}" type="text" class="form-control" name="name"
                    value="{{ old('name') }}" placeholder="name" required>

                @if ($errors->has('name'))
                <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label for="about" class="form-label">About</label>
                <input value="{{ $country->about }}" type="text" class="form-control" name="about"
                    value="{{ old('about') }}" placeholder="about" required>

                @if ($errors->has('about'))
                <span class="text-danger text-left">{{ $errors->first('about') }}</span>
                @endif
            </div>

            <div class="mb-3">
                <label for="photo" class="form-label">Photo</label>
                <input value="{{ $country->photo }}" class="form-control" name="photo" type="file"
                    value="{{ old('photo') }}" placeholder="photo" required>{{ old('photo') }}</input>

                @if ($errors->has('photo'))
                <span class="text-danger text-left">{{ $errors->first('photo') }}</span>
                @endif
            </div>
            <div class="mb-3">
                <label for="continent_id" class="form-label">Continent</label>
                <input value="{{ $country->continent_id }}" class="form-control" name="continent_id" type="text"
                    value="{{ old('continent_id') }}" placeholder="continent_id"
                    required>{{ old('continent_id') }}</input>

                @if ($errors->has('continent_id'))
                <span class="text-danger text-left">{{ $errors->first('continent_id') }}</span>
                @endif
            </div>


            <button type="submit" class="btn btn-primary">Save changes</button>
            <a href="{{ route('countries.index') }}" class="btn btn-default">Back</a>
        </form>
    </div>

</div>

@endsection
