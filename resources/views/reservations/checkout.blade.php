@extends('layouts.default')


@section('content')

  <div class="col-12">
    <div class="login-wrap">
        <div class="login-content" style="margin-top: 50px; padding: 50px 100px;">
            <div class="login-form" style="border: 1px solid black;">
                <h2 style="padding-left: 20px; padding-top: 20px;">CHECKOUT</h2>
                <div>
                    <label for="">First name</label>
                    <p>{{ Auth::user()->first_name }}</p>
                </div>
                <div>
                    <label for="">Last name</label>
                    <p>{{ Auth::user()->last_name }}</p>
                </div>
                <div>
                    <label for="">Tour</label>
                    <p>{{ $tour->name }}</p>
                </div>
                <div>
                    <label for="">Start date</label>
                    <p>{{ $tour->start_date }}</p>
                </div>
                 <div>
                    <label for="">End date</label>
                    <p>{{ $tour->end_date }}</p>
                </div>
                 <div>
                    <label for="">Number of adults</label>
                </div>
                 <div>
                    <label for="">Number of children</label>
                </div>
                 <div>
                    <label for="">Special wishes</label>
                    @foreach ((unserialize($tour->special_wishes)) as $t)
                        @if ($t === $tour->special_wishes)
                    <p>{{ $t['name'] }}</p>
                    <p>{{ $t['price'] }}</p>
                      @endif
          @endforeach
                </div>
                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">RESERVE</button>
            </div>
        </div>
    </div>
</div>


@endsection
