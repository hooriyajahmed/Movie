@extends('Admin.sidebar')

@section('admin')

<style>
* {
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

.page-black-bg {
  background: linear-gradient(135deg, #1b1b2f, #0f0f1f);
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  padding: 50px 20px;
}

.category-container {
  background: rgba(0,0,0,0.85);
  border-radius: 20px;
  padding: 50px 45px;
  width: 500px; /* Thoda bara kiya */
  text-align: center;
  box-shadow: 0 0 50px rgba(255,255,255,0.05);
  backdrop-filter: blur(5px);
}

.category-container h2 {
  color: #ff4c60;
  font-size: 1.8rem; /* Thoda bada kiya */
  margin-bottom: 30px;
  text-shadow: 0 0 12px #ff4c60, 0 0 25px #ff4c60;
}

.input-field {
  position: relative;
  margin-bottom: 25px; /* Thoda zyada spacing */
}

.input-field input {
  width: 100%;
  padding: 15px 15px 15px 45px; /* Thoda zyada padding */
  border: 2px solid #ff4c60;
  border-radius: 15px;
  background: transparent;
  font-size: 1rem; /* Thoda bada font */
  color: #fff;
  outline: none;
  box-shadow: 0 0 15px rgba(255,76,96,0.4);
  transition: 0.3s;
}

.input-field input:focus {
  box-shadow: 0 0 25px #ff4c60;
  border-color: #ff4c60;
}

.input-field i {
  position: absolute;
  left: 12px;
  top: 50%;
  transform: translateY(-50%);
  font-size: 1rem;
  color: #ff4c60;
}

.btn-category {
  width: 100%;
  padding: 16px;
  border: none;
  border-radius: 25px;
  background: #ff4c60;
  color: #fff;
  font-size: 1.05rem; /* Thoda bada font */
  font-weight: 600;
  cursor: pointer;
  box-shadow: 0 0 18px #ff4c60, 0 0 35px #ff4c60;
  transition: 0.3s;
}

.btn-category:hover {
  background: #e03d53;
  color: #fff;
  box-shadow: 0 0 30px #ff4c60, 0 0 60px #ff4c60;
}

.message {
  margin-bottom: 20px; /* Thoda zyada spacing */
  font-size: 1rem;
  color: #4affb8;
}

.error {
  font-size: 0.9rem;
  color: #FF5555;
  margin-bottom: 15px;
  text-align: left;
}
</style>

<div class="page-black-bg">
  <div class="category-container">

    <h2>🎬 Insert Category</h2>

    @if(session('success'))
      <div class="message">{{ session('success') }}</div>
    @endif

    <form action="{{ route('insert') }}" method="post">
      @csrf

      <div class="input-field">
        <i>📂</i>
        <input type="text" name="name" value="{{ old('name') }}" placeholder="Category Name">
        @error('name')
            <small class="error">{{ $message }}</small>
        @enderror
      </div>

      <div class="input-field">
        <i>📝</i>
        <input type="text" name="desc" value="{{ old('desc') }}" placeholder="Description">
        @error('desc')
            <small class="error">{{ $message }}</small>
        @enderror
      </div>

      <button class="btn-category" type="submit">Add Category</button>
    </form>

  </div>
</div>

@endsection
