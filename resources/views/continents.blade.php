@include('includes.head')
   <header class="container">@include('includes.header')</header>
   <div class="container continents">
      <div class="continents__title">Continents: </div>
      <div class="row">
         <div class="col-12">
            @foreach ($continents as $key => $continent)
            <ul class="continent__list">
               <li>{{ $continent->name }}</li>
            </ul>
            @endforeach
            <div class="back">
               <a href="{{ config('app.url')}}">Home</a>
            </div>
         </div>
      </div>
   </div>
   @include('includes.footer')