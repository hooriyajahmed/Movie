<?php

namespace App\Models;
use App\Models\Movie;
use Illuminate\Database\Eloquent\Model;

class Trailer extends Model
{
    protected $fillable = [
        'movie_id',
        'desc',
        'video'
    ];
    
public function movie()
{
    return $this->belongsTo(Movie::class);
}
}
