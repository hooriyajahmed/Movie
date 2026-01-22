@extends('User.sidebar')

@section('user')

<style>
.profile-bg{
    background:linear-gradient(135deg,#1b1b2f,#0f0f1f);
    min-height:100vh;
    padding:120px 0 60px;
}

.profile-box{
    max-width:800px;
    margin:auto;
    background:#111;
    border-radius:15px;
    padding:40px;
    box-shadow:0 0 25px rgba(255,76,96,0.35);
}

.profile-box h2{
    text-align:center;
    color:#ff4c60;
    margin-bottom:30px;
    text-shadow:0 0 10px #ff4c60;
}

.profile-table{
    width:100%;
    border-collapse:collapse;
    color:#fff;
}

.profile-table td{
    padding:15px;
    border-bottom:1px solid #333;
}

.profile-table td:first-child{
    width:30%;
    color:#aaa;
    font-weight:600;
}

.profile-table input{
    width:100%;
    padding:12px;
    background:#1c1c1c;
    border:1px solid #333;
    color:#fff;
    border-radius:6px;
}

.profile-table input:focus{
    outline:none;
    border-color:#ff4c60;
}

/* Buttons */
.btn-main{
    margin-top:25px;
    width:100%;
    padding:14px;
    background:#ff4c60;
    border:none;
    border-radius:30px;
    color:black;
    font-size:1.1rem;
    cursor:pointer;
    transition:.3s;
}
.btn-main a{
    color:black;     
    text-decoration:none;
    display:block;
    width:100%;
}
.btn-main:hover{
    background:#e63b50;
}

.btn-back{
    display:block;
    margin-top:15px;
    text-align:center;
    color:#aaa;
    text-decoration:none;
}

.btn-back:hover{
    color:#ff4c60; 
 }
</style>

<div class="profile-bg">
    <div class="profile-box">
        <h2>Profile</h2>

        <form method="GET" action="">
            @csrf

            <table class="profile-table">

                <tr>
                    <td>Name</td>
                    <td>
                        <input type="text" name="name" value="{{ $user->name }}" required>
                    </td>
                </tr>

                <tr>
                    <td>Email</td>
                    <td>
                        <input type="email" name="email" value="{{ $user->email }}" required>
                    </td>
                </tr>

                <tr>
                    <td>New Password</td>
                    <td>
                        <input type="password" name="password" placeholder="Enter new password">
                    </td>
                </tr>

              

            </table>

            <button type="submit" class="btn-main"><a href="{{ route('userindex') }}">Go Back</a>
               
            </button>
        </form>

    
    </div>
</div>

@endsection