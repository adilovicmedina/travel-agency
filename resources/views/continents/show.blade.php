@extends('layouts.default')

@section('title', $continent->name)
@section('content')
         <div class="col-12">
            <ul class="continent__list">
               @foreach ($continent->countries as $list_of_countries)
               <li><a href="{{ route('countries.index', $country->id) }}">{{ $list_of_countries->name }}</a></li>
               
               @endforeach
            </ul>
            <div class="back">
                <a href="{{ route('continents.edit', $continent->id) }}" class="btn btn-info">Edit</a>
               <a href="{{ config('app.url')}}">Home</a>
            </div>
         </div>
@stop