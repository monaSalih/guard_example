<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\Admin\DashboardController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::get('/client_side', function () {
    return view('second_auth.login');
})->name('clientLogin');

Route::post('/client/login',[ClientController::class,'login'])->name('client.login');
Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');
// Route::get('/logout', function() {
//     Auth::logout();  // Log the user out
//     return redirect('/login');  // Redirect to the login page
// });
Route::prefix('admin')->middleware(['auth','isAdmin'])->group(function(){
    Route::get('/dashboard',[DashboardController::class,'index']);
});

