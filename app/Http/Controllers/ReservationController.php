<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use App\Models\Tour;
use App\Models\User;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{
    public function index(User $user)
    {
        // $reservations = Reservation::where('user_id', $user->id)->paginate(10);

        $reservations = DB::table('reservations')
            ->join('users', 'reservations.user_id', '=', 'users.id')
            ->where('reservations.user_id', '=', $user->id)
            ->join('tours', 'reservations.tour_id', '=', 'tours.id')
            ->select('users.username as username', 'tours.name as name', 'tours.start_date as start_date', 'tours.end_date as end_date', 'reservations.total_price as total_price', 'reservations.number_of_people as number_of_people')
            ->get();
        return view('reservations.index', compact('reservations'));
    }

    public function create(Tour $tour)
    {
        return view('reservations.create',
            [
                'tour' => $tour,
            ]);
    }

    public function store(Request $request, Tour $tour)
    {
        $request->validate([
            'number_of_people' => 'required',
        ]);

        $number_of_people = $request->number_of_people;

        $reservation = Reservation::create([
            'number_of_people' => $number_of_people,
            'tour_id' => $tour->id,
            'user_id' => Auth::id(),
            'total_price' => $tour->price * $number_of_people,
        ]);

        return redirect()
            ->route('tours.tour', $tour->id)
            ->withSuccess(__('Reservation created successfully.'));
    }

}
