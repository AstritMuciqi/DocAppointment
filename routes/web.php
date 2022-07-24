<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\AppointmentController;


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
Route::get('/dashboard', function () {
    return view('dashboard');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware'=>['auth','admin']], function(){
   Route::resource('doctor','App\Http\Controllers\DoctorController');
});

Route::group(['middleware'=>['auth','doctor']], function(){
    Route::resource('appointment','App\Http\Controllers\AppointmentController');
    Route::post('/appointment/check', 'App\Http\Controllers\AppointmentController@check') ->
        name('appointment.check');
    Route::post('/appointment/update', 'App\Http\Controllers\AppointmentController@updateTime') ->
        name('update');
});  

Route::get('/', 'App\Http\Controllers\FrontendController@index');

Route::get('/new-appointment/{doctorId}/{date}', 'App\Http\Controllers\FrontendController@show')->name('create.appointment');

Route::get('/dashboard','App\Http\Controllers\DashboardController@index');

Route::post('/book/appointment','FrontendController@store')->name('booking.appointment')->middleware('auth');

Route::get('/my-booking','FrontendController@myBookings')->name('my.booking');
