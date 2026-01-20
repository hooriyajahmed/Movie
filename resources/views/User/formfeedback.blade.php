<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Feedback</title>

    <!-- SAME THEME STYLE -->
    <style>
        body{
            margin:0;
            min-height:100vh;
            background:linear-gradient(135deg,#1b1b2f,#0f0f1f);
            display:flex;
            align-items:center;
            justify-content:center;
            font-family:Arial, Helvetica, sans-serif;
            color-scheme: dark;
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
            display:block;
        }

        input, textarea, select{
            width:100%;
            background:#000;
            border:1px solid #ff4c60;
            color:#fff;
            border-radius:8px;
            padding:12px;
            margin-bottom:16px;
        }

        textarea{
            resize:none;
            height:100px;
        }

        input:focus, textarea:focus, select:focus{
            outline:none;
            border-color:#ff2f92;
            box-shadow:0 0 10px rgba(255,76,96,.4);
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
            font-weight:700;
            box-shadow:0 0 25px rgba(255,76,96,.9);
        }

        .text-danger{
            color:#ff4c60;
            font-size:13px;
            margin-top:-10px;
            margin-bottom:10px;
        }
    </style>
</head>
<body>

<div class="booking-card">

    <div class="card-header">
        <h2>Feedback</h2>
        <p>Tell us about your movie experience 🎬</p>
    </div>

    @if(session('success'))
        <div class="success-message">
            {{ session('success') }}
        </div>
    @endif

    <form method="POST" action="/feedback">
        @csrf

        <label>Your Name</label>
        <input type="text" name="name" placeholder="Enter your name">
        @error('name')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <label>Your Email</label>
        <input type="email" name="email" placeholder="Enter your email">
        @error('email')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <label>Rating</label>
        <select name="rating">
            <option value="">Select Rating</option>
            <option value="5">★★★★★ Excellent</option>
            <option value="4">★★★★☆ Good</option>
            <option value="3">★★★☆☆ Average</option>
            <option value="2">★★☆☆☆ Poor</option>
            <option value="1">★☆☆☆☆ Very Bad</option>
        </select>

        <label>Your Feedback</label>
        <textarea name="message" placeholder="Write your feedback here..."></textarea>
        @error('message')
            <div class="text-danger">{{ $message }}</div>
        @enderror

        <button type="submit">Submit Feedback</button>
    </form>

</div>

</body>
</html>