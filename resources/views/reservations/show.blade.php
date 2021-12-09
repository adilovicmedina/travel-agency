@extends('layouts.app')

@section('dashboard_content')

  <div class="row">
                            <div class="col-lg-12" style="margin-top: 120px;">
                                <div class="row">
                                    <div class="col-6">
                                <h2 class="title-1 m-b-25">Reservations</h2>
                                </div>
                                <div class="col-6" style="text-align: right;">
                                </div>
                                </div>
                                <div class="table-responsive table--no-card m-b-40">
                                    <table class="table table-borderless table-striped table-earning">
                                        <thead>
                                            <tr>
                                            <th scope="col" width="1%">#</th>
                                            <th>name</th>
                                            <th>tours</th>
                                                <th>total price</th>
                                                <th>show</th>
                                                <th class="text-right">delete</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($reservations as $reservation)
                                            <tr>
                                                <td>
                                                {{ $reservation->resID }}</td>
                                                 <td> {{ $reservation->username }} </td>
                                                <td> {{ $reservation->name }} </td>
                                                <td>{{ $reservation->total_price }}</td>
                                                <td>
                                                    <a class="btn btn-primary btn-sm" href="{{ route('reservations.show_one', [$reservation->userID, $reservation->resID, $reservation->tourID]) }}">Show</a>
                                                </td>
                                                <td class="text-right">
                                                    {!! Form::open(['method' => 'DELETE', 'route' => ['reservations.delete', $reservation->userID, $reservation->resID],'style'=>'display:inline']) !!}
                                                    {!! Form::submit('Delete', ['class' => 'btn btn-danger btn-sm']) !!}
                                                    {!! Form::close() !!}
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    <div class="d-flex">
            {!! $reservations->links() !!}
        </div>
                                </div>
                            </div>
                        </div>
@endsection
