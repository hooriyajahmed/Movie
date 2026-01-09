<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\authController;
use App\Http\Controllers\bookingController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\movieController;
use App\Http\Controllers\trailerController;
use App\Http\Controllers\userController;
use App\Http\Middleware\validrole;
use App\Http\Middleware\validuser;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/register', [authController::class, 'registerpage'])->name('registerpage');
Route::get('/login', [authController::class, 'loginpage'])->name('loginpage');
//UserRegister
Route::post('/register>user', [authController::class, 'registeruser'])->name('registeruser');
//UserLogin
Route::post('/login>user', [authController::class, 'loginuser'])->name('loginuser');
//Admin
Route::get('/adminpage', [adminController::class, "adminindex"])->name('adminindex')->middleware(validrole::class);
//User
Route::get('/user>index', [userController::class, 'userindex'])->name('userindex')->middleware(validuser::class);
//fetchusers
Route::get('/admin>alluser', [adminController::class, "alluser"])->name('alluser')->middleware(validrole::class);
//deleteusers
Route::get('/delete/{id}', [adminController::class, 'deleteuser'])->name('deleteuser')->middleware(validrole::class);
//logout
Route::get('/logout', [authController::class, 'logout'])->name('logout');

Route::get('admin>category', [categoryController::class, "insert"])->name("insertcategory")->middleware(validrole::class);

Route::post('admin>insert', [categoryController::class, "insertcategory"])->name("insert")->middleware(validrole::class);
//fetch category
Route::get('/fetchcategory', [categoryController::class, "fetch"])->name("fetchcategory")->middleware(validrole::class);
//delete category
Route::get('/deletecategory/{id}', [categoryController::class, 'deletecategory'])->name('deletecategory')->middleware(validrole::class);
// category edit
Route::get("/editcategory{id}", [categoryController::class, "edit"])->name("editcategory")->middleware(validrole::class);

Route::post("/updatecategory{id}", [categoryController::class, "update"])->name("updatecategory")->middleware(validrole::class);
// Show insert form
Route::get('Admin>insertmovie', [movieController::class, 'insert'])->name('insertmovie')->middleware(validrole::class);
// Handle form submission (POST)
Route::post('Admin>insertmovie', [movieController::class, 'insertmovie'])->name('movieinsert')->middleware(validrole::class);
// Fetch movies
Route::get('Admin>fetchmovie', [movieController::class, 'fetch'])->name('fetchmovie')->middleware(validrole::class);
// Delete movie
Route::get('Admin/deletemovie/{id}', [movieController::class, 'delete'])->name('deletemovie')->middleware(validrole::class);
// Edit movie form
Route::get('Admin/editmovie/{id}', [movieController::class, 'edit'])->name('editmovie')->middleware(validrole::class);
// Update movie
Route::post('Admin/updatemovie/{id}', [movieController::class, 'update'])->name('updatemovie')->middleware(validrole::class);
// booking
Route::get('/booking', [bookingController::class, 'userbooking'])->name('/booking');

Route::post('/booking', [bookingController::class, 'store'])->name('/booking');

Route::get('/bookings', [bookingController::class, 'fetchbooking'])->name('/bookings');

//Trailer
Route::get('/addtrailer', [trailerController::class, 'index'])->name('addtrailer')->middleware(validrole::class);

Route::post('/store>trailer', [trailerController::class, 'store'])->name('trailer.store')->middleware(validrole::class);

Route::get('/fetch>trailer', [trailerController::class, 'fetch'])->name('fetchtrailer')->middleware(validrole::class);

Route::get('/delete-trailer/{id}', [trailerController::class, 'delete'])->name('trailer.delete')->middleware(validrole::class);

Route::get('/edit-trailer/{id}', [trailerController::class, 'edit'])->name('trailer.edit')->middleware(validrole::class);

Route::post('/update-trailer/{id}', [trailerController::class, 'update'])->name('trailer.update')->middleware(validrole::class);

//user cate
Route::get('/user>category',[userController::class,'fatchcategory'])->name('fatchcategory');

// user movie
Route::get('/user>movie/{id}',[userController::class,'moviecategory'])->name('moviecategory');
