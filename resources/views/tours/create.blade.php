@extends('layouts.app')

@section('dashboard_content')
    <div class="bg-light p-4 rounded"  style="width: 70%; margin: 120px auto;">
        <h2>Add new tour</h2>
        <div class="lead">
            Add new tour.
        </div>

        <div class="container mt-4">

            <form method="POST" action="{{ route('tours.store') }}">
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ old('name') }}"
                        type="text"
                        class="form-control"
                        name="name"
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
                <div class="mb-3">
                    <label for="start_date" class="form-label">Start date</label>
                    <input value="{{ old('start_date') }}"
                        type="date"
                        class="form-control"
                        name="start_date"
                        placeholder="start_date" required>

                    @if ($errors->has('start_date'))
                        <span class="text-danger text-left">{{ $errors->first('start_date') }}</span>
                    @endif
                </div>
                <div class="mb-3">
                    <label for="end_date" class="form-label">End date</label>
                    <input value="{{ old('end_date') }}"
                        type="date"
                        class="form-control"
                        name="end_date"
                        placeholder="end_date" required>

                    @if ($errors->has('end_date'))
                        <span class="text-danger text-left">{{ $errors->first('end_date') }}</span>
                    @endif
                </div>
                   <div class="mb-3">
                    <label for="price" class="form-label">Price</label>
                    <input value="{{ old('price') }}"
                        type="number"
                        class="form-control"
                        name="price"
                        placeholder="price" required>

                    @if ($errors->has('price'))
                        <span class="text-danger text-left">{{ $errors->first('price') }}</span>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary">Save</button>
                <a href="{{ route('tours.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>
    </div>



    @endsection
