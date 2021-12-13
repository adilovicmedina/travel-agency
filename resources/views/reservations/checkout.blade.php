@extends('layouts.default')


@section('content')
<?php echo $_GET['number_of_people'];
?>
  <div class="col-12">
    <div class="login-wrap">
        <div class="login-content" style="margin-top: 50px; padding: 50px 100px;">
            <div class="login-form" style="border: 1px solid black;">
                <h2 style="padding-left: 20px; padding-top: 20px;">CHECKOUT</h2>
                <form method="POST" action="{{ route('reservations.store', $tour->id) }}" style="padding: 30px;">
                @csrf
                <div>
                    <label for="">First name</label>
                    <input class="au-input au-input--full"
                            type="text"
                            name="first_name"
                            placeholder="{{ Auth::user()->first_name }}"
                            id="first_name"
                            value= "{{ Auth::user()->first_name }}" readonly>
                </div>

                <div>
                    <label for="">Last name</label>
                    <input class="au-input au-input--full"
                            type="text"
                            name="last_name"
                            placeholder="{{ Auth::user()->last_name }}"
                            id="last_name"
                            value= "{{ Auth::user()->last_name }}" readonly>
                </div>
                <div>
                    <label for="">Tour</label>
                    <input class="au-input au-input--full"
                            type="text"
                            name="name"
                            placeholder="{{ $tour->name }}"
                            id="name"
                            value= "{{ $tour->name }}" readonly>
                </div>

                 <div>
                    <label for="">Number of adults</label>
                    <input class="au-input au-input--full"
                            type="number"
                            name="number_of_people"
                            placeholder="{{ $_GET['number_of_people'] }}"
                            id="number_of_people"
                            value= "{{ $_GET['number_of_people'] }}" readonly>
                </div>
                 <div>
                    <label for="">Number of children</label>
                     <input class="au-input au-input--full"
                            type="number"
                            name="number_of_children"
                            placeholder="{{ $_GET['number_of_children'] }}"
                            id="number_of_children"
                            value= "{{ $_GET['number_of_children'] }}" readonly>
                </div>
                 <div>
                    <label for="">Special wishes</label>
                    @foreach( $_GET['special_wishes'] as $key => $special)
                      <input value="{{ $special }}"
                        type="text"
                        class="form-control"
                        name="special[]"
                        readonly>
                        @endforeach

                </div>
               <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">RESERVE</button>

</form>
            </div>
        </div>
    </div>
</div>


@endsection
