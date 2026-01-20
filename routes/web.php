<?php

use App\Http\Controllers\adminController;
use App\Http\Controllers\authController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\categoryController;
use App\Http\Controllers\celebrityController;
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
// Edit user page
Route::get('/admin/user/edit/{id}', [adminController::class, 'editUser'])->name('edituser');
// Update user
Route::post('/admin/user/update/{id}', [adminController::class, 'updateUser'])->name('updateuser');
//deleteusers
Route::get('/delete/{id}', [adminController::class, 'deleteuser'])->name('deleteuser')->middleware(validrole::class);
//logout
Route::get('/logout', [authController::class, 'logout'])->name('logout');

Route::get('admin>category', [categoryController::class, "insert"])->name("insertcategory");

Route::post('admin>insert', [categoryController::class, "insertcategory"])->name("insert");
//fetch category
Route::get('/fetchcategory', [categoryController::class, "fetch"])->name("fetchcategory");
//delete category
Route::get('/deletecategory/{id}', [categoryController::class, 'deletecategory'])->name('deletecategory');
// category edit
Route::get("/editcategory{id}", [categoryController::class, "edit"])->name("editcategory");

Route::post("/updatecategory{id}", [categoryController::class, "update"])->name("updatecategory");
// Show insert form
Route::get('Admin>insertmovie', [movieController::class, 'insert'])->name('insertmovie');
// Handle form submission (POST)
Route::post('Admin>insertmovie', [movieController::class, 'insertmovie'])->name('movieinsert');
// Fetch movies
Route::get('Admin>fetchmovie', [movieController::class, 'fetch'])->name('fetchmovie');
// Delete movie
Route::get('Admin/deletemovie/{id}', [movieController::class, 'delete'])->name('deletemovie');
// Edit movie form
Route::get('Admin/editmovie/{id}', [movieController::class, 'edit'])->name('editmovie');
// Update movie
Route::post('Admin/updatemovie/{id}', [movieController::class, 'update'])->name('updatemovie');

// booking form open
Route::get('/booking/{id}', [BookingController::class, 'userbooking'])
    ->name('bookingform.');

// booking save
Route::post('/booking', [BookingController::class, 'store'])
    ->name('booking.store');

// all bookings
Route::get('/bookings', [BookingController::class, 'fetchbooking'])
    ->name('fetchbookings');

//Trailer
Route::get('/addtrailer', [trailerController::class, 'index'])->name('addtrailer')->middleware(validrole::class);

Route::post('/store>trailer', [trailerController::class, 'store'])->name('trailer.store')->middleware(validrole::class);

Route::get('/fetch>trailer', [trailerController::class, 'fetch'])->name('fetchtrailer')->middleware(validrole::class);

Route::get('/delete-trailer/{id}', [trailerController::class, 'delete'])->name('trailer.delete')->middleware(validrole::class);

Route::get('/edit-trailer/{id}', [trailerController::class, 'edit'])->name('trailer.edit')->middleware(validrole::class);

Route::post('/update-trailer/{id}', [trailerController::class, 'update'])->name('trailer.update')->middleware(validrole::class);

//user cate
Route::get('/user>category', [userController::class, 'fatchcategory'])->name('fatchcategory');

// user movie
Route::get('/user>movie/{id}', [userController::class, 'moviecategory'])->name('moviecategory');

Route::get('/user>allmovie', [userController::class, 'movieall'])->name('allmovie');

//admin celebrity
Route::get('/celebrity', [celebrityController::class, 'celebritypage'])->name('celebrity');

Route::post('/admin/insertcelebrity', [celebrityController::class, 'insertcelebrity'])->name('celebrityinsert')->middleware(validrole::class);
// Fetch celebrity
Route::get('/admin/fetchcelebrity', [celebrityController::class, 'fetch'])->name('fetchcelebrity')->middleware(validrole::class);
// Delete celebrity
Route::get('/admin/deletecelebrity/{id}', [celebrityController::class, 'delete'])->name('deletecelebrity')->middleware(validrole::class);
// Edit celebrity form
Route::get('/admin/editcelebrity/{id}', [celebrityController::class, 'edit'])->name('editcelebrity')->middleware(validrole::class);
// Update celebrity
Route::post('/admin/updatecelebrity/{id}', [celebrityController::class, 'update'])->name('updatecelebrity')->middleware(validrole::class);

// user celebrity
Route::get('/user/celebrity',[userController::class,'celebrityname'])->name('celebrityname');
// Admin Feedback List

Route::get('/admin/feedback', [adminController::class, 'feedbackList'])
    ->middleware('auth')
    ->name('admin.feedback');

// feedback delete

Route::delete('/admin/feedback/{id}', [adminController::class, 'deleteFeedback'])
    ->name('admin.feedback.delete');
//user blog
Route::get('/user/blog',[userController::class,'blogdetail'])->name('blogdetail');