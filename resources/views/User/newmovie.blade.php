@extends('User.sidebar')

@section('user')

<style>
.page-title {
    text-align: center;
    color: #fff;
    margin-bottom: 40px;
    font-size: 2.4rem;
    text-shadow: 0 0 12px #ff4c60;
}

.dark-card {
    background: linear-gradient(135deg, #111, #1c1c1c);
    border-radius: 18px;
    padding: 20px;
    box-shadow: 0 15px 35px rgba(0,0,0,0.8);
    transition: 0.4s ease;
    text-align: center;
    height: 100%;
}

.dark-card:hover {
    transform: translateY(-12px) scale(1.03);
    box-shadow: 0 0 30px #ff4c60;
}

.movie-img {
    width: 100%;
    height: 260px;
    object-fit: cover;
    border-radius: 14px;
}

.dark-card h5 {
    color: #ff4c60;
    font-size: 22px;
    margin-top: 15px;
}

.dark-card p {
    color: #ccc;
    font-size: 14px;
    margin-bottom: 6px;
}

.price {
    color: #fff;
    font-weight: bold;
    font-size: 16px;
}

.seats {
    color: #aaa;
    font-size: 13px;
}
.col-md-4 {
    margin-bottom: 40px;
}
</style>

<div class="movie-items">
    <div class="container">
        <h1 class="page-title mt-5">All Movies</h1>

        <div class="row justify-content-center mt-4 gy-5">
            @foreach ($allmovie as $movie)
                <div class="col-md-4 mb-5 d-flex">
                    <div class="dark-card w-100">

                        <img src="{{ asset('storage/movie/'.$movie->picture) }}" 
                             class="movie-img" alt="Movie Image">

                        <h5>{{ $movie->name }}</h5>
                        <p>{{ $movie->desc }}</p>

                        <p class="price">💰 Price: {{ $movie->amount }}</p>
                        <p class="seats">🎟 Seats: {{ $movie->seats }}</p>

                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection