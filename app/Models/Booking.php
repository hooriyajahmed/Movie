<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'movie_name',
        'show_time',
        'seat_class',
        'seats',
        'booking_date'
    ];
}