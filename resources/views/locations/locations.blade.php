@extends('layouts.default')

@section('title', 'Locations:')
@section('content')

<div class="col-12">
    @foreach ($locations as $key => $location)
    <ul class="location__list">
        <li><a href="location/{{$location->id}}">{{ $location->name }}</a></li>
    </ul>
    @endforeach
    <div class="back">
        <a href="{{ config('app.url')}}">Home</a>
    </div>
</div>

@endsection