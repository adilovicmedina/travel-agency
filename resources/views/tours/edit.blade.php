@extends('layouts.app')

@section('dashboard_content')
    <div class="bg-light p-4 rounded" style="width: 70%; margin: 120px auto;" >
        <h2>Update tour</h2>

        <div class="container mt-4">

            <form method="POST" action="{{ route('tours.update', $tour->id) }}">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ $tour->name }}" 
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
                    <label for="country_id" class="form-label">Country</label>
                 <select class="form-control" 
                        name="country_id" required>
                   <option value="">Select country</option>
                        @foreach($countries as $country)
                            <option value="{{ $country->id }}">{{ $country->name }}</option>
                        @endforeach
                    </select>

                    @if ($errors->has('country_id'))
                        <span class="text-danger text-left">{{ $errors->first('country_id') }}</span>
                    @endif
                </div>

                  <div class="mb-3">
                    <label for="location_id" class="form-label">Location</label>
                        <select class="form-control" 
                        name="location_id" required>
                   <option value="">Select location</option>
                        @foreach($locations as $location)
                            <option value="{{ $location->id }}">{{ $location->name }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('location_id'))
                        <span class="text-danger text-left">{{ $errors->first('location_id') }}</span>
                    @endif
                </div>


                <button type="submit" class="btn btn-primary">Save changes</button>
                <a href="{{ route('tours.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
@endsection