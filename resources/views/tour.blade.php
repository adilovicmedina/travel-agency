@include('includes.head')
<header class="container">@include('includes.header')</header>
<div class="container tour">
   <div class="tour__title">{{ $tour->name }}</div>
   <div class="row">
      <div class="col-12">
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
         <div class="back">
            <a href="{{ config('app.url')}}/single-country/{{$tour->country_id}}">Back</a>
         </div>
      </div>
   </div>
</div>
@include('includes.footer')