@extends('layouts.app')


@section('dashboard_content')

    <div class="bg-light p-4 rounded"  style="width: 70%; margin: 120px auto;">
        <h2>Update post</h2>

        <div class="container mt-4">

            <form method="POST" action="{{ route('continents.update', $continent->id) }}">
                @method('patch')
                @csrf
                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ $continent->name }}" 
                        type="text" 
                        class="form-control" 
                        name="name" 
                        value= "{{ old('name') }}"
                        placeholder="name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>


                <button type="submit" class="btn btn-primary">Save changes</button>
                <a href="{{ route('continents.index') }}" class="btn btn-default">Back</a>
            </form>
        </div>

    </div>
    @endsection