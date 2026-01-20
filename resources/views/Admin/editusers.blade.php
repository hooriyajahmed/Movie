@extends('Admin.sidebar')

@section('admin')

<style>
.edit-bg{
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: linear-gradient(135deg, #1b1b2f, #0f0f1f);
}

.edit-card{
    background: rgba(0,0,0,0.85);
    border-radius: 25px;
    padding: 45px 40px;
    width: 380px;
    text-align: center;
    box-shadow: 0 0 45px rgba(255,76,96,0.25);
    backdrop-filter: blur(6px);
}

.edit-card h2{
    color: #ff4c60;
    font-size: 1.7rem;
    margin-bottom: 10px;
    text-shadow: 0 0 12px #ff4c60, 0 0 25px #ff4c60;
}

.edit-card p{
    color: #bbb;
    font-size: 0.9rem;
    margin-bottom: 25px;
}

.input-field{
    position: relative;
    margin-bottom: 18px;
}

.input-field input{
    width: 100%;
    padding: 13px 15px 13px 42px;
    border-radius: 18px;
    border: 2px solid #ff4c60;
    background: transparent;
    color: #fff;
    outline: none;
    font-size: 0.9rem;
    box-shadow: 0 0 12px rgba(255,76,96,0.35);
    transition: 0.3s;
}

.input-field input:focus{
    box-shadow: 0 0 22px #ff4c60;
}

.input-field i{
    position: absolute;
    top: 50%;
    left: 14px;
    transform: translateY(-50%);
    color: #ff4c60;
}

.error{
    color: #ff6b6b;
    font-size: 0.75rem;
    margin-top: 4px;
    display: block;
    text-align: left;
}

.update-btn{
    width: 100%;
    padding: 14px;
    border-radius: 30px;
    border: none;
    background: #ff4c60;
    color: #fff;
    font-weight: 600;
    font-size: 1rem;
    cursor: pointer;
    box-shadow: 0 0 18px #ff4c60, 0 0 35px #ff4c60;
    transition: 0.3s;
}

.update-btn:hover{
    background: #e03d53;
    box-shadow: 0 0 30px #ff4c60, 0 0 55px #ff4c60;
    transform: translateY(-2px);
}
</style>

<div class="edit-bg">
    <div class="edit-card">

        <h2>Update User</h2>
        <p>Edit user information securely</p>

        <form action="{{ route('updateuser', $user->id) }}" method="POST">
            @csrf

            <div class="input-field">
                <i>👤</i>
                <input type="text" name="name"
                       value="{{ old('name', $user->name) }}"
                       placeholder="Full Name">
                @error('name')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-field">
                <i>📧</i>
                <input type="email" name="email"
                       value="{{ old('email', $user->email) }}"
                       placeholder="Email Address">
                @error('email')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-field">
                <i>🔒</i>
                <input type="password" name="password"
                       placeholder="New Password (optional)">
                @error('password')
                    <span class="error">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="update-btn">
                Update User
            </button>

        </form>
    </div>
</div>

@endsection
