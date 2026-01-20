@extends('User.sidebar')

@section('user')
    
<div class="movie-items">
    <div class="container">
        <div class="row justify-content-center mt-5">
               <h1 class="page-title mt-5">All Categories</h1>
            @foreach ($allmovie as $allmovie)
                <div class="col-md-4 mb-4 d-flex justify-content-center">
                    <div class="dark-card text-center">
                        <img src="{{ asset('storage/movie/' . $allmovie->picture) }}"
     class="movie-img" width="100%" height="50%"
     alt="please wait">
                        <h5 class="mt-4">{{ $allmovie->name }}</h5>
                        <p>{{ $allmovie->desc }}</p>
                        <p>{{$allmovie->amount}}</p>
                        <p>{{$allmovie->seats}}</p>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection