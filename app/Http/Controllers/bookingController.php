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

        // ✅ Movie fetch
        $movie = Movie::findOrFail($req->movie_id);

        // ✅ Seats availability check (important)
        if ($movie->seats < $req->seats) {
            return back()->with('error', 'Not enough seats available');
        }

        // ✅ Seats minus
        $movie->seats = $movie->seats - $req->seats;
        $movie->save();

        // ✅ Booking create with user_id
        Booking::create([
            'movie_id'     => $req->movie_id,
            'user_id'      => auth()->id(), // 👈 USER ID
            'show_time'    => $req->show_time,
            'seat_class'   => $req->seat_class,
            'seats'        => $req->seats,
            'booking_date' => $req->booking_date,
        ]);

        return back()->with('success', 'Booking Confirmed Successfully');
    }

    // ✅ FETCH BOOKINGS (ADMIN)
    public function fetchbooking()
    {
        $bookings = Booking::with(['movie', 'user'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('Admin.fetchbooking', compact('bookings'));
    }
}
