<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Welcome to CineBook</title>
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

.container {
  background: rgba(0,0,0,0.85);
  border-radius: 20px;
  padding: 50px 40px;
  text-align: center;
  width: 360px;
  box-shadow: 0 0 40px rgba(255,255,255,0.05);
  backdrop-filter: blur(5px);
}

h1 {
  font-size: 2rem;
  font-weight: 700;
  color: #ff4c60;
  margin-bottom: 15px;
  text-shadow: 0 0 10px #ff4c60, 0 0 20px #ff4c60;
}

p {
  font-size: 1rem;
  color: #bbb;
  margin-bottom: 30px;
}

.btn {
  display: block;
  width: 100%;
  padding: 14px;
  border-radius: 25px;
  font-size: 1rem;
  font-weight: 600;
  margin: 12px 0;
  text-decoration: none;
  text-align: center;
  cursor: pointer;
  transition: 0.3s;
  border: none;
}

.btn-login {
  background: #ff4c60;
  color: #fff;
  box-shadow: 0 0 15px #ff4c60, 0 0 30px #ff4c60;
}

.btn-login:hover {
  background: #e03d53;
  box-shadow: 0 0 25px #ff4c60, 0 0 50px #ff4c60;
}

.btn-register {
  background: transparent;
  color: #ff4c60;
  border: 2px solid #ff4c60;
  box-shadow: 0 0 10px rgba(255,76,96,0.5);
}

.btn-register:hover {
  background: #ff4c60;
  color: #fff;
  box-shadow: 0 0 20px #ff4c60, 0 0 40px #ff4c60;
}

</style>
</head>
<body>

<div class="container">
    <h1>Welcome to CineBook</h1>
    <p>Book your favorite movies and enjoy the show. Login or register to continue!</p>

    <a href="{{ route('loginpage') }}" class="btn btn-login">Login</a>
    <a href="{{ route('registerpage') }}" class="btn btn-register">Register</a>
</div>

</body>
</html>
