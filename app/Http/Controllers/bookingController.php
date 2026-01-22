<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\Movie;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    // Booking form open
    public function userbooking($id)
    {
        $movie = Movie::findOrFail($id);
        return view('Admin.booking', compact('movie')); // Admin.booking view me form hoga
    }

    // Booking save and PDF generate
    public function store(Request $req)
    {
        // Validation
        $req->validate([
            "movie_id"     => "required|exists:movies,id",
            "show_time"    => "required",
            "seat_class"   => "required",
            "seats"        => "required|integer|min:1",
            "booking_date" => "required|date"
        ]);

        // Movie seats update
        $movie = Movie::findOrFail($req->movie_id);

        if($movie->seats < $req->seats){
            return back()->with('error', 'Not enough seats available');
        }

        $movie->seats -= $req->seats;
        $movie->save();

        // Booking create and store in variable
        $booking = Booking::create([
            'user_id'      => Auth::user()->id,
            'movie_id'     => $req->movie_id,
            'show_time'    => $req->show_time,
            'seat_class'   => $req->seat_class,
            'seats'        => $req->seats,
            'booking_date' => $req->booking_date,
        ]);

        // PDF generate using the $booking variable
        $pdf = Pdf::loadView('pdf.bookingpdf', compact('booking'));

        // Download the PDF
        return $pdf->download('booking-slip.pdf');
    }



function bookingform(){

return view('Admin.booking');
}




    // Optional: fetch bookings
    public function fetchbooking()
    {
        $bookings = Booking::with('movie')
            ->orderBy('created_at', 'desc')
            ->paginate(10);

        return view('Admin.fetchbooking', compact('bookings'));
    }
}