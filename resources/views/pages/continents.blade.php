
@extends('layouts.default')

@section('title', 'Continents:')
@section('content')
     
         <div class="col-12">
            @foreach ($continents as $key => $continent)
            <ul class="continent__list">
               <li><a href="continent/{{$continent->id}}">{{ $continent->name }}</a></li>
            </ul>
            @endforeach
            <div class="back">
               <a href="{{ config('app.url')}}">Home</a>
            </div>
         </div>
@stop