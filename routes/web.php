<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ReservationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {


	Route::post('events-post', [EventController::class, 'store'])->name('events.post');
    Route::resource('events', EventController::class)->except(['index', 'destroy']);
    Route::get('my-events', [EventController::class, 'myEvents'])->name('events.my-events');

    Route::resource('reservations', ReservationController::class)->only(["create"]);
	Route::post('reservations-post', [ReservationController::class, 'store'])->name('reservations.post');


});
