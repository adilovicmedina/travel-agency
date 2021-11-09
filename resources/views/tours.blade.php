@include('includes.head')
<header class="container">@include('includes.header')</header>
<div class="container tour">
   <div class="tour__title">Tours: </div>
   <div class="row">
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
   </div>
</div>
</div>
@include('includes.footer')