@include('includes.head')
<header class="container">@include('includes.header')</header>
<div class="container country">
   <div class="country__title">Countries</div>
   <div class="row">
      @foreach ($getCountryList as $key => $country)
      <div class="col-6 country__items"/>
         <a href="single-country/{{$country->id}}">{{ $country->name }} - {{$country->continent->name}} </a>
         <img src="{{ asset($country->photo) }} ">
      </div>
      @endforeach
   </div>
</div>
@include('includes.footer')