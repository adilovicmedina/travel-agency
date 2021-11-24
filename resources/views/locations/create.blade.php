@extends('layouts.app')


@section('dashboard_content')
    <div class="bg-light p-4 rounded" style="width: 70%; margin: 120px auto;" >
        <h2>Add new location</h2>
        <div class="lead">
            Add new location.
        </div>

        <div class="container mt-4">

            <form method="POST" action="{{ route('locations.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ old('name') }}" 
                        type="text" 
                        class="form-control" 
                        name="name" 
                        value= "{{ old('name') }}"
                        placeholder="name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="latitude" class="form-label">latitude</label>
                    <input
                        type="number" 
                        class="form-control" 
                        name="latitude" 
                        value= "{{ old('latitude') }}"
                        placeholder="latitude" required>

                    @if ($errors->has('latitude'))
                        <span class="text-danger text-left">{{ $errors->first('latitude') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="longitude" class="form-label">longitude</label>
                    <input 
                        type="number" 
                        class="form-control" 
                        name="longitude" 
                        value= "{{ old('longitude') }}"
                        placeholder="longitude" required>

                    @if ($errors->has('longitude'))
                        <span class="text-danger text-left">{{ $errors->first('longitude') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="photo" class="form-label">photo</label>
                    <input value="{{ old('photo') }}" 
                        type="text" 
                        class="form-control" 
                        name="photo" 
                        value= "{{ old('photo') }}"
                        placeholder="photo" required>

                    @if ($errors->has('photo'))
                        <span class="text-danger text-left">{{ $errors->first('photo') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="country_id" class="form-label">Country id</label>
                    <input value="{{ old('country_id') }}" 
                        type="text" 
                        class="form-control" 
                        name="country_id" 
                        value= "{{ old('country_id') }}"
                        placeholder="country_id" required>

                    @if ($errors->has('country_id'))
                        <span class="text-danger text-left">{{ $errors->first('country_id') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('locations.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>

    @endsection