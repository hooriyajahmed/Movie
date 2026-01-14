<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Movie;

class BookingController extends Controller
{
    // ✅ BOOKING FORM OPEN (GET /booking/{id})
    public function userbooking($id)
    {
        $movie = Movie::findOrFail($id);
        return view('Admin.booking', compact('movie'));
    }

    // ✅ BOOKING SAVE (POST /booking)
    public function store(Request $req)
    {
        $data = $req->validate([
            "movie_id"     => "required|exists:movies,id",
            "show_time"    => "required",
            "seat_class"   => "required",
            "seats"        => "required|integer|min:1",
            "booking_date" => "required|date"
        ]);

       $movie = Movie::find($req['movie_id']);

$movie->seats = $movie->seats - $req['seats'];
$movie->save();

         
        Booking::create($data);

        return back()->with('success','Booking Confirmed Successfully');
    }

    // (optional)
    public function fetchbooking()
{
    $bookings = Booking::with('movie')
        ->orderBy('created_at', 'desc')
        ->paginate(10);

    return view('Admin.fetchbooking', compact('bookings'));
}


}
