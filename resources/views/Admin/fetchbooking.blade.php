<!DOCTYPE html>
<html>
<head>
    <title>Booked Tickets</title>

    <style>
        body{
            margin:0;
            min-height:100vh;
            background:linear-gradient(135deg,#1b1b2f,#0f0f1f);
            padding:40px;
            font-family:Arial, Helvetica, sans-serif;
            text-shadow:0 0 20px #ff4c60;
            color:#fff;
        }

        h2{
            text-align:center;
            color:#ff4c60;
            margin-bottom:30px;
            text-transform:uppercase;
            font-weight:700;
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
</head>
<body>

<h2>🎟 Booked Tickets</h2>

<div class="table-box">
    <table>
        <tr>
            <th>ID</th>
            <th>Movie</th>
            <th>Show Time</th>
            <th>Seat Class</th>
            <th>Seats</th>
            <th>Price</th>
            <th>Date</th>
        </tr>

        @foreach($bookings as $booking)
        <tr>
            <td>{{ $booking->id }}</td>
            <td>{{ $booking->movie_name }}</td>
            <td>{{ $booking->show_time }}</td>
            <td>{{ $booking->seat_class }}</td>
            <td>{{ $booking->seats }}</td>
            <td>
                @php
                    $price_per_seat = 0;
                    if($booking->seat_class == 'Gold') $price_per_seat = 500;
                    elseif($booking->seat_class == 'Platinum') $price_per_seat = 800;
                    elseif($booking->seat_class == 'Box') $price_per_seat = 1200;
                @endphp
                {{ $price_per_seat * $booking->seats }}
            </td>
            <td>{{ $booking->booking_date }}</td>
        </tr>
        @endforeach

    </table>
</div>

</body>
</html>