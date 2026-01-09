<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Movie Ticket Booking</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body{
            margin:0;
            min-height:100vh;
            background:linear-gradient(135deg,#1b1b2f,#0f0f1f);
            display:flex;
            align-items:center;
            justify-content:center;
            font-family:Arial, Helvetica, sans-serif;
            color-scheme: dark; /* ⭐ calendar dark mode */
        }

        .booking-card{
            background:#111;
            border:1px solid #222;
            border-radius:14px;
            padding:40px;
            width:500px;
            box-shadow:0 0 30px rgba(255,76,96,.3);
        }

        .card-header{
            background:none;
            border:none;
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

        label{
            color:#ccc;
            font-size:14px;
            margin-bottom:6px;
        }

        input,select{
            background:#000;
            border:1px solid #ff4c60;
            color:#fff;
            border-radius:8px;
            padding:12px;
            margin-bottom:16px;
            accent-color:#ff4c60; /* ⭐ calendar highlight pink */
        }

        input::placeholder{
            color:#777;
        }

        input:focus,select:focus{
            outline:none;
            border-color:#ff2f92;
            background:#000;
            box-shadow:0 0 10px rgba(255,76,96,.4);
            color:#fff;
        }

        
        input[type="date"]::-webkit-calendar-picker-indicator{
            filter: invert(1) sepia(1) saturate(5) hue-rotate(315deg);
            cursor:pointer;
        }

        .row{
            gap:15px;
        }

        button{
            width:100%;
            background:#ff4c60;
            border:none;
            padding:12px;
            border-radius:25px;
            color:#fff;
            font-weight:600;
            box-shadow:0 0 20px rgba(255,76,96,.9);
            transition:.3s;
        }

        button:hover{
            background:#ff2f92;
            transform:translateY(-2px);
        }

    
        .success-message{
            background:#1a0f14;
            border:1px solid #ff4c60;
            color:#ff4c60;
            padding:14px;
            border-radius:12px;
            text-align:center;
            margin-bottom:20px;
            font-size:15px;
            font-weight:700;
            box-shadow:0 0 25px rgba(255,76,96,.9);
            text-shadow:0 0 10px rgba(255,76,96,.9);
        }

        .text-danger{
            font-size:13px;
        }
    </style>
</head>
<body>

<div class="booking-card">

    <div class="card-header">
        <h2>🎟 Movie Booking</h2>
        <p>Select your show & seats</p>
    </div>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="/booking">
        @csrf

        <label>Movie Name</label>
        <input type="text" name="movie_name" placeholder="John Wick 5" required>

        <div class="row">
            <div class="col">
                <label>Show Time</label>
                <input type="text" name="show_time" placeholder="7:30 PM" required>
            </div>

            <div class="col">
                <label>Seat Class</label>
                <select name="seat_class" required>
                    <option value="Gold">Gold</option>
                    <option value="Platinum">Platinum</option>
                    <option value="Box">Box</option>
                </select>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <label>Seats</label>
                <input type="number" name="seats" min="1" required>
            </div>

            <div class="col">
                <label>Date</label>
                <input type="date" name="booking_date" required>
            </div>
        </div>

        <button type="submit">Confirm Booking</button>
    </form>

</div>

</body>
</html>