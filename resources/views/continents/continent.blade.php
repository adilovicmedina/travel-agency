@extends('layouts.default')

@section('title', $continent->name)
@section('content')
         <div class="col-12">
            <ul class="continent__list">
               @foreach ($continent->countries as $list_of_countries)
               <li><a href="{{ config('app.url')}}/single-country/{{$list_of_countries->id}}">{{ $list_of_countries->name }}</a></li>

               @endforeach
            </ul>
            <div class="back">
               <a href="{{ config('app.url')}}">Home</a>
            </div>
         </div>
@endsection
