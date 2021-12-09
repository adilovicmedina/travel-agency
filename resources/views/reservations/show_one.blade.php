@extends('layouts.app')

@section('dashboard_content')

 <div class="col-lg-12" style="margin-top: 120px;">
    <div class="row">
        <div class="col-6">
            <h2 class="title-1 m-b-25">Reservations</h2>
</div>
    </div>
    <div class="table-responsive table--no-card m-b-40">
        <table class="table table-borderless table-striped table-earning">
            <thead>
                <tr>
                    <th scope="col" width="1%">#</th>
                    <th>name</th>
                    <th>tours</th>
                    <th>start</th>
                    <th>End</th>
                    <th>Number of adults</th>
                    <th>Number of children</th>
                    <th>Total price</th>
                    <th>Special wishes</th>
            </thead>
            <tbody>
                <td>{{ $reservation->id }}</td>
                <td>{{ $user->username }}</td>
                <td>{{ $tour->name }}</td>
                <td>{{ $tour->start_date }}</td>
                <td>{{ $tour->end_date }}</td>
                <td>{{ $reservation->number_of_people }}</td>
                <td>{{ $reservation->number_of_children }}</td>
                <td>{{ $reservation->total_price }}</td>
                <td>{{ $reservation->special_wishes }}</td>

            </tbody>
    </table>
 </div>
  <p><a href="{{ route('reservations.show')}}" class="btn btn-primary btn-sm">Back</a></p>

 @endsection
