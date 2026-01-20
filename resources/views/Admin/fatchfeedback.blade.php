@extends('admin.sidebar')

@section('admin')

<style>
    /* ===== CARD WRAPPER ===== */
    .booking-card{
        background:#111;
        border:1px solid #222;
        border-radius:14px;
        padding:30px;
        width:100%;
        box-shadow:0 0 30px rgba(255,76,96,.3);
    }

    .card-header{
        text-align:center;
        margin-bottom:25px;
    }

    .card-header h2{
        color:#ff4c60;
        font-weight:700;
        text-transform:uppercase;
        text-shadow:0 0 12px rgba(255,76,96,.9);
    }

    .card-header p{
        color:#aaa;
        font-size:14px;
    }

    table{
        width:100%;
        border-collapse: collapse;
        color:#fff;
        font-family: Arial, Helvetica, sans-serif;
    }

    th, td{
        border:1px solid #ff4c60;
        padding:10px;
        text-align:center;
    }

    thead{
        background:#000;
    }

    th{
        color:#ff4c60;
        text-transform: uppercase;
        font-size:13px;
    }

    tbody tr:nth-child(even){
        background:#0b0b0b;
    }

    tbody tr:hover{
        background:#111;
    }

    td{
        font-size:14px;
    }

    .btn-danger{
        background:#ff4c60;
        border:none;
        padding:6px 12px;
        border-radius:25px;
        font-size:13px;
        cursor:pointer;
        box-shadow:0 0 15px rgba(255,76,96,.8);
        transition:.3s;
    }

    .btn-danger:hover{
        background:#ff2f92;
    }

    .success-message{
        background:#1a0f14;
        border:1px solid #ff4c60;
        color:#ff4c60;
        padding:14px;
        border-radius:12px;
        text-align:center;
        margin-bottom:20px;
        font-weight:700;
        box-shadow:0 0 25px rgba(255,76,96,.9);
    }
</style>

<div class="booking-card">

    <div class="card-header">
        <h2>Users Feedback</h2>
        <p>All users who submitted feedback</p>
    </div>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <table>
        <thead>
            <tr>
                <th>#</th>
                <!-- <th>User ID</th> -->
                <th>User Name</th>
                <th>Email</th>
                <th>Feedback</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($feedbacks as $key => $feedback)
            <tr>
                <td>{{ $key+1 }}</td>
                <!-- <td>{{ $feedback->user_id }}</td> -->
                <td>{{ $feedback->user->name ?? $feedback->name }}</td>
                <td>{{ $feedback->email }}</td>
                <td>{{ $feedback->message }}</td>
                <td>{{ $feedback->created_at->format('d M Y') }}</td>
                <td>
                    <form action="{{ route('admin.feedback.delete', $feedback->id) }}" 
                          method="POST" 
                          onsubmit="return confirm('Are you sure you want to delete this feedback?');">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

@endsection