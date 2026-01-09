@extends('User.sidebar')
@section('user')
<style>
/* Page heading */
.page-title {
    text-align: center;
    color: #fff;
    margin-bottom: 100px;
    font-size: 2.2rem;
    text-shadow: 0 0 10px #ff4c60;
}

/* Card styling */
.dark-card {
    background: linear-gradient(135deg, #111, #1c1c1c);
    border-radius: 15px;
    padding: 25px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.7);
    transition: all 0.4s ease;
    height: 100%;
}

.dark-card:hover {
    transform: translateY(-10px) scale(1.03);
    box-shadow: 0 0 25px #ff4c60;
}

/* Card text */
.dark-card h5 {
    color: #ff4c60;
    font-size: 20px;
    margin-bottom: 15px;
}

.dark-card p {
    color: #ccc;
    font-size: 14px;
    line-height: 1.6;
}

/* Button */
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
</style>

<div class="movie-items">
    <div class="container">
        <div class="row justify-content-center mt-5">
               <h1 class="page-title mt-5">All Categories</h1>
            @foreach ($cat as $cat)
                <div class="col-md-4 mb-4 d-flex justify-content-center">
                    <div class="dark-card text-center">
                        <h5>{{ $cat->name }}</h5>
                        <p>{{ $cat->desc }}</p>
                        <a href="{{route('moviecategory',$cat->id) }}" class="dark-btn">Get Movies</a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>

@endsection