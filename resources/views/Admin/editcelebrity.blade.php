@extends('Admin.sidebar')

@section('admin')

<style>
.page-black-bg{
    background:linear-gradient(135deg,#1b1b2f,#0f0f1f);
    min-height:100vh;
    padding:60px 0;
    text-shadow:0 0 20px #ff4c60;
}

.dark-form{
    background-color:#111;
    border-radius:12px;
    padding:40px;
    border:1px solid #222;
    max-width:600px;
    min-height:300px;
}

.dark-title{
    color:#ff4c60;
    font-size:28px;
    font-weight:700;
    text-transform:uppercase;
}

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

.dark-input[type="file"]{
    padding:6px;
}

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

            <div class="col-md-8">
                <div class="dark-form">

                    <h2 class="dark-title mb-4 mt-2">
                         Update Celebrity
                    </h2>

                    <form action="{{ route('updatecelebrity',$data->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <input type="text" name="name"
                                   value="{{ $data->name }}"
                                   class="form-control dark-input"
                                   placeholder="celebrity Name">
                            @error('name')
                                <p class="text-danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                           

                        <div class="mb-3 text-center">
                            <input type="file" name="pic"
                                   class="form-control dark-input">
                            <img src="{{ url('storage/celebrity/'.$data->picture) }}"
                                 class="mt-3"
                                 style="border-radius:50%; box-shadow:0 0 15px #ff4c60"
                                 height="80" width="80">
                            @error('pic')
                                <p class="text-danger mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="text-center mt-4">
                            <button class="dark-btn">
                                Update celebrity
                            </button>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>

@endsection