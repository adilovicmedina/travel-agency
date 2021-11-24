@extends('layouts.default')

@section('title', 'Tours:')
@section('content')

<div class="col-12">
   <ul class="tour__list">
      @foreach ($getTourList as $key => $tour)
      <li><a href="{{ config('app.url')}}/tour/{{$tour->id}}">{{ $tour->name }} : {{ $tour->start_date }} - {{ $tour->end_date }}</a></li>
      <li><a href="{{ config('app.url')}}/single-country/{{$tour->country_id}}">{{ $tour->country->name }}
         </a>
      </li>
      @endforeach
   </ul>

   <div class="back">
      <a href="{{ config('app.url')}}">Home</a>
   </div>
</div>
@endsection