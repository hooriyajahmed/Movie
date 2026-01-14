@extends('User.sidebar')
@section('user')

<style>
.page-title {
    text-align: center;
    color: #fff;
    margin-bottom: 100px;
    font-size: 2.2rem;
    text-shadow: 0 0 10px #ff4c60;
}

.dark-card {
    background: linear-gradient(135deg, #111, #1c1c1c);
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.7);
    transition: all 0.4s ease;
    height: 100%;
    text-align: center;
}

.dark-card:hover {
    transform: translateY(-10px) scale(1.03);
    box-shadow: 0 0 25px #ff4c60;
}

.dark-card img {
    width: 100%;
    height: 250px;
    object-fit: cover;
    border-radius: 12px;
    margin-bottom: 15px;
}

.dark-card h5 {
    color: #ff4c60;
    font-size: 20px;
    margin-bottom: 10px;
}

.dark-card p {
    color: #ccc;
    font-size: 14px;
    line-height: 1.6;
}

.dark-btn {
    margin-top: 10px;
    display: inline-block;
    padding: 10px 25px;
    background: #ff4c60;
    color: #fff;
    border-radius: 30px;
    text-decoration: none;
    transition: 0.3s;
}

.dark-btn:hover {
    background: #fff;
    color: #ff4c60;
}
.movie-img{
    width:80px;
    height:80px;
    border-radius:50%;
    object-fit:cover;
    /* box-shadow:0 0 15px #ff4c60; */
}
</style>

<div class="movie-items">
    <div class="container">
        <h1 class="page-title mt-5">Movies</h1>

        <div class="row justify-content-center mt-4">
            @foreach ($catmovie as $movie)
                <div class="col-md-4 mb-5 d-flex justify-content-center">
                    <div class="dark-card">
                        
                        {{-- Movie Image --}}
                      <img src="{{ asset('storage/movie/'.$movie->picture) }}" class="movie-img" >
                        {{-- Movie Info --}}
                        <h5>{{ $movie->name }}</h5>
                        <p>{{($movie->desc) }}</p>

                        <a href="{{route('booking.form',$movie->id)}}" class="dark-btn">Book Now</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection