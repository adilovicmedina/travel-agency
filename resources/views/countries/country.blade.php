@extends('layouts.default')

@section('content')

@foreach ($getCountryList as $key => $country)
<div class="col-6 country__items">
    <a href="single-country/{{$country->id}}">{{ $country->name }} - {{$country->continent->name}}
        <div>
            <img src="{{ asset('images/' .$country->photo) }} ">
        </div>
    </a>

</div>

@endforeach
<div>
    {{ $getCountryList->links() }}
</div>
@endsection
