
@extends('layouts.default')

@section('title', $tour->name)
@section('content')

<div class="col-6">
   <div class="tour__items">
      <h4>About tour:</h4>
      <div class="tour__items--date">
         <p>Start date: </p>
         {{$tour->start_date}}
      </div>
      <div class="tour__items--date">
         <p>End date:</p>
         {{$tour->end_date}}
      </div>
       <div style="margin-top: 25px; ">
         <h6>Price:</h6>
         {{$tour->price}}
      </div>
      <div style="margin-top: 50px;">
       <li style="list-style: none; ">
         <a style="font-size: 20px; padding: 10px;" class="btn btn-primary btn-sm" href="{{ route('reservations.create', $tour->id) }}">Reserve</a>
      </li>
      </div>
   </div>
</div>
<div class="col-6">
   <div class="tour__items">
      <div class="tour__items--location">
         <h4>Location:</h4>
         <a href="{{ config('app.url')}}/location/{{$tour->location->id}}">{{$tour->location->name}} </a>
      </div>
   </div>
</div>
<div class="back">
   <a href="{{ config('app.url')}}/single-country/{{$tour->country_id}}">Back</a>
</div>

@endsection
