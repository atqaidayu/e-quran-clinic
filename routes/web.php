<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LearnerController;




Route::get('viewlogin', function () {
    // Logic for displaying the login form
    return view('login'); // Assuming you have a Blade view named 'login.blade.php'
})->name('viewlogin');

// // add protected routes
// Route::prefix('admin')->middleware(['auth:admin'])->group(function () {
//     Route::post('logout', [AdminController::class, 'logout']);
//     Route::post('{id}', [AdminController::class, 'UserData']);
// }


// Route for submitting the login form
Route::post('loginAdmin', [AdminController::class, 'login'])->name('loginAdmin');

// Route for submitting the login form
Route::post('loginLearner', [LearnerController::class, 'login'])->name('loginLearner');

// Route for logging out
Route::post('logout', [AdminController::class, 'logout'])->name('logout');


// Route for Dashboard
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');


// Route for 404 page
Route::view('/404', 'errors.404')->name('404');

// Route for blank page
Route::view('/blank', 'blank')->name('blank');

// Route for buttons page
Route::view('/buttons', 'buttons')->name('buttons');

// Route for cards page
Route::view('/cards', 'cards')->name('cards');

// Route for charts page
Route::view('/charts', 'charts')->name('charts');

// Route for forgot password page
Route::view('/forgot-password', 'auth.forgot-password')->name('forgot-password');

// Route for register page
Route::view('/register', 'auth.register')->name('register');

// Route for tables page
Route::view('/tables', 'tables')->name('tables');

// Route for utilities-animation page
Route::view('/utilities-animation', 'utilities.animation')->name('utilities-animation');

// Route for utilities-border page
Route::view('/utilities-border', 'utilities.border')->name('utilities-border');

// Route for utilities-color page
Route::view('/utilities-color', 'utilities.color')->name('utilities-color');

// Route for utilities-other page
Route::view('/utilities-other', 'utilities.other')->name('utilities-other');



