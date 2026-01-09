<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Register - CineBook</title>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

body {
  background: linear-gradient(135deg, #1b1b2f, #0f0f1f);
  display: flex;
  justify-content: center;
  align-items: center;
  height: 100vh;
  color: #fff;
}

.register-container {
  background: rgba(0,0,0,0.85);
  border-radius: 20px;
  padding: 50px 40px;
  width: 360px;
  text-align: center;
  box-shadow: 0 0 40px rgba(255,255,255,0.05);
  backdrop-filter: blur(5px);
}

h2 {
  color: #ff4c60;
  font-size: 1.6rem;
  margin-bottom: 10px;
  text-shadow: 0 0 10px #ff4c60, 0 0 20px #ff4c60;
}

p {
  font-size: 0.95rem;
  color: #bbb;
  margin-bottom: 25px;
}

.input-field {
  position: relative;
  margin-bottom: 20px;
}

.input-field input {
  width: 100%;
  padding: 12px 15px 12px 40px;
  border: 2px solid #ff4c60;
  border-radius: 15px;
  background: transparent;
  font-size: 0.95rem;
  color: #fff;
  outline: none;
  box-shadow: 0 0 10px rgba(255,76,96,0.4);
  transition: 0.3s;
}

.input-field input:focus {
  box-shadow: 0 0 20px #ff4c60;
  border-color: #ff4c60;
}

.input-field i {
  position: absolute;
  left: 12px;
  top: 50%;
  transform: translateY(-50%);
  font-size: 0.95rem;
  color: #ff4c60;
}

.btn {
  width: 100%;
  padding: 14px;
  border: none;
  border-radius: 25px;
  background: #ff4c60;
  color: #fff;
  font-size: 1rem;
  font-weight: 600;
  cursor: pointer;
  box-shadow: 0 0 15px #ff4c60, 0 0 30px #ff4c60;
  transition: 0.3s;
}

.btn:hover {
  background: #e03d53;
  box-shadow: 0 0 25px #ff4c60, 0 0 50px #ff4c60;
}

.message {
  margin-bottom: 15px;
  font-size: 0.9rem;
  color: #4affb8;
}

.error {
  font-size: 0.85rem;
  color: #FF5555;
  margin-bottom: 15px;
  text-align: left;
}

.options {
  margin-top: 15px;
  font-size: 0.85rem;
  color: #bbb;
}

.options a {
  color: #ff4c60;
  text-decoration: none;
  font-weight: 600;
  transition: 0.3s;
}

.options a:hover {
  color: #e03d53;
  text-shadow: 0 0 10px #ff4c60;
}
</style>

</head>
<body>

<div class="register-container">

  <h2>Create Your Account</h2>
  <p>Join CineBook to book your favorite movies instantly!</p>

  <form action="{{ route('registeruser') }}" method="POST">
      @csrf

  <div class="input-field">
    <i>👤</i>
    <input type="text" name="name" value="{{ old('name') }}" placeholder="Full Name">
    @error('name')
        <small class="error">{{ $message }}</small>
    @enderror
  </div>

  <div class="input-field">
    <i>📧</i>
    <input type="email" name="email" value="{{ old('email') }}" placeholder="Email">
    @error('email')
        <small class="error">{{ $message }}</small>
    @enderror
  </div>

  <div class="input-field">
    <i>🔒</i>
    <input type="password" name="password" placeholder="Password" >
    @error('password')
        <small class="error">{{ $message }}</small>
    @enderror
  </div>

  <button class="btn" type="submit">Register</button>

  <div class="options">
    Already have an account? <a href="{{ route('loginpage') }}">Login</a>
  </div>
  </form>
</div>

</body>
</html>
