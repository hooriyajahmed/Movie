@extends('Admin.sidebar')

@section('admin')

<style>
    body{
        background:linear-gradient(135deg,#1b1b2f,#0f0f1f);
        font-family:Arial, Helvetica, sans-serif;
        color:#fff;
    }

    h2{
        text-align:center;
        color:#ff4c60;
        margin-bottom:30px;
        text-transform:uppercase;
        font-weight:700;
        text-shadow:0 0 20px #ff4c60;
    }

    .table-box{
        background:#111;
        border:1px solid #222;
        border-radius:12px;
        padding:20px;
        box-shadow:0 0 30px rgba(255,76,96,.3);
    }

    table{
        width:100%;
        border-collapse:collapse;
    }

    th,td{
        padding:12px;
        text-align:center;
        border-bottom:1px solid #222;
    }

    th{
        background:#ff4c60;
        color:#fff;
        text-transform:uppercase;
        font-size:14px;
    }

    td{
        color:#ddd;
        font-size:14px;
    }

    tr:hover{
        background:#1a1a1a;
    }
</style>

<div class="container-fluid px-4">

    <h2 class="mt-3">🎟 Booked Tickets</h2>

    <div class="table-box table-responsive">

        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>User</th>
                    <th>Movie</th>
                    <th>Show Time</th>
                    <th>Seat Class</th>
                    <th>Seats</th>
                    <th>Total Price</th>
                    <th>Date</th>
                </tr>
            </thead>

            <tbody>
            @forelse($bookings as $booking)

                @php
                    $price = match($booking->seat_class){
                        'Gold' => 500,
                        'Platinum' => 800,
                        'Box' => 1200,
                        default => 0
                    };
                    $total = $price * $booking->seats;
                @endphp

                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->user->name ?? $booking->user->email ?? 'N/A' }}</td>
                    <td>{{ $booking->movie->name ?? 'N/A' }}</td>
                    <td>{{ $booking->show_time }}</td>
                    <td>{{ $booking->seat_class }}</td>
                    <td>{{ $booking->seats }}</td>
                    <td>Rs {{ number_format($total) }}</td>
                    <td>{{ \Carbon\Carbon::parse($booking->booking_date)->format('d M Y') }}</td>
                </tr>

            @empty
                <tr>
                    <td colspan="8" style="color:#aaa;">
                        No bookings found
                    </td>
                </tr>
            @endforelse
            </tbody>
        </table>

        <!-- Pagination -->
        <div class="mt-3 d-flex justify-content-center">
            {{ $bookings->links() }}
        </div>

    </div>
</div>

@endsection
