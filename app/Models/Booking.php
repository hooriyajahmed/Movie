<?php

namespace App\Models;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
    'movie_id',
    'user_id',
    'show_time',
    'seat_class',
    'seats',
    'booking_date'
    ];

    // ✅ ADD THIS RELATION
    public function movie()
    {
        return $this->belongsTo(Movie::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
