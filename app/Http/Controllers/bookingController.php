<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    
    public function userbooking()
    {
        return view('Admin.booking');
    }

    
    public function store(Request $req)
    {
        $data = $req->validate([
            "movie_name"   => "required",
            "show_time"    => "required",
            "seat_class"   => "required",
            "seats"        => "required|integer|min:1",
            "booking_date" => "required|date"
        ]);

        Booking::create($data);

        return back()->with('success','Booking Confirmed Successfully');

    }

    
    public function fetchbooking()
    {
        $bookings = Booking::orderBy('created_at','desc')->get();
        return view('booking.index', compact('bookings'));
    }
}