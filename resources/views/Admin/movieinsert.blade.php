@extends('Admin.sidebar')

@section('admin')

<style>
/* Page area */
.page-black-bg{
    background:linear-gradient(135deg,#1b1b2f,#0f0f1f);
    min-height:100vh;
    padding:60px 0;
    text-shadow:0 0 20px #ff4c60;
}

/* Form box */
.dark-form{
    background-color:#111;
    border-radius:12px;
    padding:40px;
    border:1px solid #222;
    max-width:600px;
    min-height:300px;
}

/* Title */
.dark-title{
    color:#ff4c60;
    font-size:28px;
    font-weight:700;
    text-transform:uppercase;
}

/* Inputs */
.dark-input{
    background:#000;
    border:1px solid #ff4c60;
    color:#fff;
}

.dark-input::placeholder{
    color:#777;
}

.dark-input:focus{
    background:#000;
    color:#fff;
    border-color:#ff2f92;
    box-shadow:none;
}

/* File input fix */
.dark-input[type="file"]{
    padding:6px;
}

/* Button */
.dark-btn{
    background:#ff4c60;
    color:#fff;
    border:none;
    padding:10px 35px;
    border-radius:25px;
    box-shadow:0 0 20px #ff4c60;
}
</style>

<div class="page-black-bg">
    <div class="container">
        <div class="row justify-content-center text-center">
           <div class="col-md-2"></div>
           
            <div class="col-md-8 ">

                <div class="dark-form">
                    <h2 class="dark-title mb-4 mt-2">
                        🎥 Insert Movie
                    </h2>

                    @if(session('success'))
                        <p class="text-success">{{ session('success') }}</p>
                    @endif

                    <form action="{{ route('movieinsert') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <input type="text" name="name"
                                   class="form-control dark-input"
                                   placeholder="Movie Name" required>
                        </div>

                        <div class="mb-3">
                            <input type="number" name="amount"
                                   class="form-control dark-input"
                                   placeholder="Amount" required>
                        </div>

                        <div class="mb-3">
                            <textarea name="desc"
                                      class="form-control dark-input"
                                      placeholder="Description" rows="3" required></textarea>
                        </div>

                        <div class="mb-3">
                            <input type="number" name="seats"
                                   class="form-control dark-input"
                                   placeholder="Seats" required>
                        </div>
                          <div class="mb-3">
                           <select name="cat_id" class="form-control dark-input">
                            <option disabled selected>--select any category---</option>
                           @foreach ($cat as $cat)
                               <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                           @endforeach
                           </select>
                        </div>

                        <div class="mb-3">
                            <input type="file" name="pic"
                                   class="form-control dark-input" required>
                        </div>

                        <div class="text-center mt-4">
                            <button class="dark-btn">
                                Insert Movie
                            </button>
                        </div>

                    </form>
                </div>

            </div>

           <div class="col-md-2"></div>
        </div>
    </div>
</div>

@endsection