
@extends('layouts.app')



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
         </div>
      </div>
      <div class="col-6">   
         <div class="tour__items">   
         <div class="tour__items--location">
            <h4>Location:</h4>
               <a href="{{ config('app.url')}}/location/{{$tour->location->id}}">{{$tour->location->name}} 
            </a>
            </div>    
         </div> 
      </div> 
         <div class="back">
            <a href="{{ config('app.url')}}/single-country/{{$tour->country_id}}">Back</a>
         </div>
      </div>
      
@endsection

