 @extends('layouts.default')


@section('content')

<div class="container">
    <table style="border: 1px solid #222; margin-bottom: 50px;">
            <thead style="border: 1px solid #222;">
                <th style="border: 1px solid #222; padding: 20px;">Tours</th>
                <th style="border: 1px solid #222; padding: 20px;">Start</th>
                <th style="border: 1px solid #222; padding: 20px;">End</th>
                <th style="border: 1px solid #222; padding: 20px;">Number of adults</th>
                <th style="border: 1px solid #222; padding: 20px;">Number of children</th>
                <th style="border: 1px solid #222; padding: 20px;">Total price</th>
                <th style="border: 1px solid #222; padding: 20px;">Special wishes</th>
                <th style="border: 1px solid #222; padding: 20px;">Edit</th>
                <th style="border: 1px solid #222; padding: 20px;">Delete</th>
            </thead>
             @foreach ($reservations as $reservation)
            <tbody style="border: 1px solid #222; padding: 20px;">
                <td style="border: 1px solid #222; padding: 20px;">{{ $reservation->name }}</td>
                <td style="border: 1px solid #222; padding: 20px;">{{ $reservation->start_date }}</td>
                <td style="border: 1px solid #222; padding: 20px;">{{ $reservation->end_date }}</td>
                <td style="border: 1px solid #222; padding: 20px;">{{ $reservation->number_of_people }}</td>
                <td style="border: 1px solid #222; padding: 20px;">{{ $reservation->number_of_children }}</td>
                <td style="border: 1px solid #222; padding: 20px;">{{ $reservation->total_price }}</td>
                <td style="border: 1px solid #222; padding: 20px;">{{ $reservation->special_wishes }}</td>
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
    <div style="margin-left:15px; margin-bottom: 50px;">
        <a href="{{ route('users.show_user', Auth::id()) }}" style="background-color: #dc3545; padding:10px 25px; color: #fff; border-radius: 5px;">Back</a>
    </div>

 @endsection
