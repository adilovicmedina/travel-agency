 @extends('layouts.default')


@section('content')

<div class="container">
    <table style="border: 1px solid #222; margin-bottom: 50px;">
            <thead style="border: 1px solid #222;">
                <th style="border: 1px solid #222; padding: 20px;">User</th>
                <th style="border: 1px solid #222; padding: 20px;">Tours</th>
                <th style="border: 1px solid #222; padding: 20px;">Start</th>
                <th style="border: 1px solid #222; padding: 20px;">End</th>
                <th style="border: 1px solid #222; padding: 20px;">Number of people</th>
                <th style="border: 1px solid #222; padding: 20px;">Total price</th>
                <th style="border: 1px solid #222; padding: 20px;">Edit</th>
                <th style="border: 1px solid #222; padding: 20px;">Delete</th>
            </thead>
             @foreach ($reservations as $reservation)
            <tbody style="border: 1px solid #222; padding: 20px;">
                <td style="border: 1px solid #222; padding: 20px;">{{ $reservation->username }}</td>
                <td style="border: 1px solid #222; padding: 20px;">{{ $reservation->name }}</td>
                <td style="border: 1px solid #222; padding: 20px;">{{ $reservation->start_date }}</td>
                <td style="border: 1px solid #222; padding: 20px;">{{ $reservation->end_date }}</td>
                <td style="border: 1px solid #222; padding: 20px;">{{ $reservation->number_of_people }}</td>
                <td style="border: 1px solid #222; padding: 20px;">{{ $reservation->total_price }}</td>
                  <td style="border: 1px solid #222; padding: 20px;">
                        <a class="btn btn-primary btn-sm" href="{{ route('reservations.edit', [$reservation->userID, $reservation->resID, $reservation->tourID]) }}">Edit</a>
                    </td>
                   <td style="border: 1px solid #222; padding: 20px;">
                        {!! Form::open(['method' => 'DELETE', 'route' => ['reservations.delete', $reservation->userID, $reservation->resID],'style'=>'display:inline']) !!}
                        {!! Form::submit('Cancel', ['class' => 'btn btn-danger btn-sm']) !!}
                        {!! Form::close() !!}
                    </td>

            </tbody>
        @endforeach
    </table>

 </div>

 @endsection
