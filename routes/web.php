<?php

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
})->name('welcome');

Route::get('/club', 'ClubController@index')->name('list.club');
Route::get('/club/track/{id}', 'ViewClubTrackController@index')->name('club.track');

// Registered user
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/home/club', 'HomeController@follow')->name('home.club');
Route::get('/home/follow/{club}/{id}', 'HomeController@update')->name('home.follow');
Route::resource('/reserve', 'ReservationController');

// Grupo para el admin
Route::prefix('admin')->group(function() {
    Route::get('/register', 'Auth\AdminRegisterController@showRegistrationForm')->name('admin.register');
    Route::post('/register', 'Auth\AdminRegisterController@register')->name('admin.register.submit');
    // Registrar club...
    Route::post('/club', 'ClubController@store')->name('club');
    
    Route::get('/login', 'Auth\AdminLoginController@showLoginForm')->name('admin.login');
    Route::post('/login', 'Auth\AdminLoginController@login')->name('admin.login.submit');

    Route::get('/', 'AdminController@index')->name('admin.dashboard');
    
    Route::resource('/club/track', 'ClubTrackController');
    Route::resource('/user', 'UserController');
});


// Caledar 
//Route::get('/cal', 'ViewClubTrackController@index');