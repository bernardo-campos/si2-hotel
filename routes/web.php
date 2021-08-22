<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\Client\MenuController as ClientMenu;
use App\Http\Controllers\Client\ReservationController as ClientReservation;
use App\Http\Controllers\Web\RoomController as WebRoom;
use App\Http\Controllers\Web\ServiceController as WebService;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::get('/home', function () {
    return view('home');
})->name('home');


// Web (public) routes
Route::group([
        'as' => 'web.',
    ],
    function() {
        Route::get('/habitaciones', [WebRoom::class, 'index'])->name('rooms.index');
        Route::get('/servicios', [WebService::class, 'index'])->name('services.index');
    }
);

Route::get('/mis-datos', [UserController::class, 'edit'])->name('profile.edit');

// Routes for Client
Route::group([
        'as' => 'client.',
        'prefix' => 'cliente',
        'middleware' => ['auth', 'role:Cliente']
    ],
    function() {
        Route::get('/reservas', [ClientReservation::class, 'index'])->name('reservations.index');
        Route::get('/menus', [ClientMenu::class, 'index'])->name('menus.index');
    }
);
