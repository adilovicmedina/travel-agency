<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
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
        $reservations = DB::table('reservations')
            ->join('users', 'reservations.user_id', '=', 'users.id')
            ->where('reservations.user_id', '=', $user->id)
            ->join('tours', 'reservations.tour_id', '=', 'tours.id')
            ->select('users.username as username', 'users.id as userID', 'tours.name as name', 'tours.start_date as start_date', 'tours.end_date as end_date', 'tours.id as tourID', 'reservations.total_price as total_price', 'reservations.number_of_people as number_of_people', 'reservations.number_of_children as number_of_children', 'reservations.id as resID', 'reservations.special_wishes as special_wishes')
            ->paginate(10);
        return response()->json($reservations);
    }

    public function create(Tour $tour)
    {
        return response()->json(['tour' => $tour]);
    }

    public function checkout(Request $request, Tour $tour)
    {
        $request->validate([
            'number_of_people' => 'required|min:0',
            'number_of_children' => 'min:1|max:10',
        ]);

        if (Auth::guest()) {

            $user = DB::table('users')->insertGetId([
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone' => $request->phone,
                'username' => $request->username,
                'email' => $request->email,
                'password' => bcrypt($request->password),
            ]);

            Auth::loginUsingId($user);
        }

        return response()->json(['tour' => $tour]);
    }

    public function store(Request $request, Tour $tour, User $user)
    {

        $number_of_people = $request->number_of_people;
        $number_of_children = $request->number_of_children;
        $tour_special = unserialize($tour->special_wishes);
        $special_price = 0;

        foreach (explode(",", $request->special) as $key => $special) {

            $special_price += (int) $tour_special[$special]['price'];
            $special_wishes[] = ['name' => $tour_special[$special]['name'], 'price' => $tour_special[$special]['price']];

        }

        $total_price = ($tour->price * $number_of_people) + ($tour->price_for_children * $number_of_children) + $special_price;

        $special_wishes_serialize = serialize($special_wishes);

        $reservation = Reservation::create([
            'number_of_children' => $number_of_children,
            'number_of_people' => $number_of_people,
            'tour_id' => $tour->id,
            'user_id' => $user->id,
            'total_price' => $total_price,
            'special_wishes' => $special_wishes_serialize,
        ]);

        if ($reservation) {

            return response()->json(['Result' => 'Reservation created successfully.']);

        } else {

            return response()->json(['Result' => 'Operation failed.']);

        }
    }

    public function edit(User $user, Reservation $reservation, Tour $tour)
    {
        return response()->json([
            'reservation' => $reservation,
            'user' => $user,
            'tour' => $tour,
        ]);
    }

    public function update(Request $request, User $user, Reservation $reservation, Tour $tour)
    {
        $updated_reservation = $reservation->update($request->only('number_of_people', 'number_of_children', 'total_price'));
        $number_of_people = $request->number_of_people;
        $number_of_children = $request->number_of_children;

        DB::table('reservations')
            ->where('id', $reservation->id)
            ->update(array('total_price' => (($tour->price * $number_of_people) + ($tour->price_for_children * $number_of_children))));

        if ($updated_reservation) {

            return response()->json(['Result' => 'Reservation updated successfully.']);

        } else {

            return response()->json(['Result' => 'Operation failed.']);

        }
    }

    public function delete(User $user, Reservation $reservation)
    {
        $deleted_reservation = $reservation->delete();

        if ($deleted_reservation) {

            return response()->json(['Result' => 'Reservation deleted successfully.']);

        } else {

            return response()->json(['Result' => 'Operation failed.']);

        }
    }

    public function show()
    {
        $reservations = DB::table('reservations')
            ->join('users', 'reservations.user_id', '=', 'users.id')
            ->join('tours', 'reservations.tour_id', '=', 'tours.id')
            ->select('users.username as username', 'users.id as userID', 'tours.name as name', 'tours.start_date as start_date', 'tours.end_date as end_date', 'tours.id as tourID', 'reservations.total_price as total_price', 'reservations.number_of_people as number_of_people', 'reservations.number_of_children as number_of_children', 'reservations.id as resID')
            ->paginate(10);

        return response()->json($reservations);

    }

    public function show_one(User $user, Reservation $reservation, Tour $tour)
    {
        return response()->json([
            'user' => $user,
            'reservation' => $reservation,
            'tour' => $tour,
        ]);

    }

}
