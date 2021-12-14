@include('includes.head')
<header class="container">@include('includes.header')</header>
<div class="container country">
    <div class="country__title">{{ $country->name }}</div>
    <div class="row">
        <div class="col-12 country__items">
            <div class="country__items--img">
                <img src="{{ asset('images/' .$country->photo) }} ">
            </div>
            <div class="country__items--about">
                <h4>About country:</h4>
                <p>{{$country->about}}</p>
                <h4>Continent:</h4>
                <p style="text-align: left">{{$country->continent->name}}</p>
            </div>
            <div class="country__items--tour">
                <h4>Tours:</h4>
                <ul>
                    @foreach ($country->tours as $ct)
                    <li><a href="{{ config('app.url')}}/tour/{{$ct->id}}"> {{$ct->name}} </a></li>
                    @endforeach
                </ul>
            </div>
            <div class="back">
                <a href="{{ route('countries.edit', $country->id) }}" class="btn btn-info">Edit</a>
                <a href="{{ route('countries.index') }}" class="btn btn-default">Back</a>
            </div>
        </div>
    </div>
</div>
@include('includes.footer')
