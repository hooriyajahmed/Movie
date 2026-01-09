@extends('Admin.sidebar')

@section('admin')

<div class="cb-bg">
    <div class="cb-panel">

        <h2 class="cb-heading">🎥 Edit Trailer</h2>

        <form action="{{ route('trailer.update', $trailer->id) }}"
              method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
                <select name="movie_id" class="form-control cb-input">
                    @foreach($movies as $movie)
                        <option value="{{ $movie->id }}"
                            {{ $trailer->movie_id == $movie->id ? 'selected' : '' }}>
                            {{ $movie->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <textarea name="desc" class="form-control cb-input" rows="3">{{ $trailer->desc }}</textarea>
            </div>

            <div class="mb-3">
                <label class="text-light">Current Trailer</label><br>
                <video width="250" controls class="cb-video">
                    <source src="{{ asset('uploads/trailers/'.$trailer->video) }}" type="video/mp4">
                </video>
            </div>

            <div class="mb-3">
                <input type="file" name="trailer" class="form-control cb-input">
                <small class="text-muted">Leave empty to keep old trailer</small>
            </div>

            <button class="cb-btn">Update Trailer</button>
        </form>

    </div>
</div>

<style>
/* ===== PAGE BACKGROUND ===== */
.cb-bg{
    min-height:100vh;
    padding:50px 30px;
    background:linear-gradient(135deg,#1b1b2f,#0f0f1f);
}

/* ===== PANEL ===== */
.cb-panel{
    max-width:700px;
    margin:auto;
    background:rgba(0,0,0,0.78);
    border-radius:25px;
    padding:35px;
    backdrop-filter:blur(8px);
    box-shadow:0 0 50px rgba(255,76,96,0.2);
}

/* ===== HEADING ===== */
.cb-heading{
    text-align:center;
    font-size:2rem;
    margin-bottom:25px;
    color:#ff4c60;
    text-shadow:0 0 15px #ff4c60,0 0 30px #ff4c60;
}

/* ===== INPUTS ===== */
.cb-input{
    background:#111;
    border:1px solid #ff4c60;
    color:#fff;
    border-radius:12px;
    padding:10px;
}

.cb-input::placeholder{
    color:#777;
}

.cb-input:focus{
    border-color:#ff2f92;
    box-shadow:none;
    background:#111;
    color:#fff;
}

/* ===== VIDEO ===== */
.cb-video{
    border-radius:15px;
    box-shadow:0 0 25px rgba(255,76,96,0.6);
    margin-top:10px;
}

/* ===== BUTTON ===== */
.cb-btn{
    background:#ff4c60;
    color:#fff;
    border:none;
    padding:12px 35px;
    border-radius:25px;
    font-weight:600;
    font-size:0.9rem;
    box-shadow:0 0 25px #ff4c60;
    transition:0.3s;
    cursor:pointer;
}

.cb-btn:hover{
    transform:translateY(-3px) scale(1.05);
    box-shadow:0 0 40px #ff4c60;
}

/* ===== TEXT ===== */
.text-muted{
    color:#aaa !important;
    font-size:0.75rem;
}
</style>

@endsection
