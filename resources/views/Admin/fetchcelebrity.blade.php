@extends('Admin.sidebar')

@section('admin')

<div class="cb-bg">

    <div class="cb-panel">

        <h2 class="cb-heading"> All Celebrities</h2>

        @if(session('success'))
            <div class="cb-success">
                {{ session('success') }}
            </div>
        @endif

        <div class="cb-table-wrap">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Picture</th>
                        <th>ACTION</th>
                      
                    </tr>
                </thead>

                <tbody>
                    @foreach($data as $celebrity)
                    <tr>
                        <td>#{{ $celebrity->id }}</td>
                        <td>{{ $celebrity->name }}</td>

                        <td>  
                         <img src="{{ asset('storage/celebrity/'.$celebrity->picture) }}" class=" movie-img">
                        </td>

                        <td>
                            <a href="{{ route('editcelebrity', $celebrity->id) }}"
                               class="btn edit" title="Edit Movie">
                                 Edit
                            </a>

                            <a href="{{ route('deletecelebrity', $celebrity->id) }}"
                               onclick="return confirm('Delete this movie?')"
                               class="btn delete" title="Delete Movie">
                                 Delete
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

    </div>
</div>

<style>
/* ===== SAME BASE THEME ===== */
.cb-bg{
    min-height:100vh;
    padding:50px 30px;
    background:linear-gradient(135deg,#1b1b2f,#0f0f1f);
}

.cb-panel{
    max-width:1200px;
    margin:auto;
    background:rgba(0,0,0,0.78);
    border-radius:30px;
    padding:35px;
    backdrop-filter:blur(8px);
    box-shadow:0 0 60px rgba(255,76,96,0.18);
}

.cb-heading{
    text-align:center;
    font-size:1.8rem;
    margin-bottom:25px;
    color:#ff4c60;
    text-shadow:0 0 15px #ff4c60,0 0 30px #ff4c60;
}

.cb-success{
    background:rgba(74,255,184,0.15);
    color:#4affb8;
    padding:14px;
    border-radius:15px;
    text-align:center;
    margin-bottom:20px;
}

/* ===== TABLE ===== */
.cb-table-wrap{
    overflow-x:auto;
    border-radius:20px;
    border:1px solid rgba(255,76,96,0.4);
    box-shadow:inset 0 0 25px rgba(255,76,96,0.15);
}

table{
    width:100%;
    border-collapse:collapse;
    color:#fff;
}

thead{
    background:linear-gradient(135deg,#ff4c60,#ff6f61);
}

thead th{
    padding:16px;
    font-size:0.85rem;
    text-transform:uppercase;
    text-align:center;
}

tbody td{
    padding:15px;
    text-align:center;
}

tbody tr:hover{
    background:rgba(255,76,96,0.15);
}

.cat-icon{
    background:#ff4c60;
    width:36px;
    height:36px;
    border-radius:50%;
    display:flex;
    align-items:center;
    justify-content:center;
    box-shadow:0 0 15px #ff4c60;
}

/* ===== MOVIE IMAGE ===== */
.movie-img{
    width:80px;
    height:80px;
    border-radius:50%;
    object-fit:cover;
    /* box-shadow:0 0 15px #ff4c60; */
}

/* ===== BUTTONS ===== */
.btn{
    padding:7px 18px;
    color:#fff;
    border-radius:20px;
    font-size:0.75rem;
    text-decoration:none;
    font-weight:600;
    margin:0 3px;
    transition:0.3s;
}

.btn.edit{
    background:#007bff;
    box-shadow:0 0 15px rgba(0,123,255,0.6);
}

.btn.edit:hover{
    transform:translateY(-3px) scale(1.1);
    box-shadow:0 0 25px rgba(0,123,255,0.9);
}

.btn.delete{
    background:#dc3545;
    box-shadow:0 0 15px rgba(220,53,69,0.6);
}

.btn.delete:hover{
    transform:translateY(-3px) scale(1.1);
    box-shadow:0 0 25px rgba(220,53,69,0.9);
}
</style>

@endsection