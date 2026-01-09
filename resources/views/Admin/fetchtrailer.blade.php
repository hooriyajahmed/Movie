@extends('Admin.sidebar')

@section('admin')

<div class="cb-bg">

    <div class="cb-panel">

        <h2 class="cb-heading">🎬 All Trailers</h2>

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
                        <th>Movie</th>
                        <th>Description</th>
                        <th>Trailer</th>
                        <th>Action</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($trailers as $trailer)
                    <tr>
                        <td>#{{ $trailer->id }}</td>

                        <td>
                            {{ $trailer->movie->name }}
                        </td>

                        <td>
                            {{ Str::limit($trailer->desc, 60) }}
                        </td>

                        <td>
                            <video width="140" controls>
                                <source src="{{ asset('uploads/trailers/'.$trailer->video) }}" type="video/mp4">
                            </video>
                        </td>
                        <td>
                           <a href="{{ route('trailer.edit', $trailer->id) }}"
                           class="btn edit">Edit</a>
                           <a href="{{ route('trailer.delete', $trailer->id) }}"
                           onclick="return confirm('Delete this trailer?')" 
                           class="btn delete">Delete</a>
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
    vertical-align:middle;
}

tbody tr:hover{
    background:rgba(255,76,96,0.15);
}

/* ===== VIDEO ===== */
video{
    border-radius:15px;
    box-shadow:0 0 20px rgba(255,76,96,0.5);
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

/* Edit button - Blue */
.btn.edit{
    background:#007bff; /* bootstrap blue color */
    box-shadow:0 0 15px rgba(0,123,255,0.6);
}

.btn.edit:hover{
    transform:translateY(-3px) scale(1.1);
    box-shadow:0 0 25px rgba(0,123,255,0.9);
}

/* Delete button - Red */
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
