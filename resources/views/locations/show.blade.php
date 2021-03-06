
@extends('layouts.default')


@section('title', $location->name)
@section('content')

<div class="col-12">
   <div class="location__items">
      <div class="location__items--about">
         <h4>Location:</h4>
         <p> Name: {{$location->name}} </p>
         @foreach($location->locations_categories as $l)
            <p> Type of tour: {{$l->name}} </p>
         @endforeach
      </div>
      <div class="location__items--info">
         <h4>Coordinates:</h4>
         {{$location->latitude}} - {{$location->longitude}}
      </div>
   </div>
</div>
<div class="back">
   <a href="{{ route('locations.index') }}">Home</a>
</div>

@stop
