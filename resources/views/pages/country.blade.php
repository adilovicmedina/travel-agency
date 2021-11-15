
@extends('layouts.default')

@section('content')

 @foreach ($getCountryList as $key => $country)
      <div class="col-6 country__items"/>
         <a href="single-country/{{$country->id}}">{{ $country->name }} - {{$country->continent->name}} </a>
         <img src="{{ asset($country->photo) }} ">
      </div>

      @endforeach
      <div>
         {{ $getCountryList->links() }}
      </div>
@endsection
