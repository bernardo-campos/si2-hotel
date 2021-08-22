<?php

use App\Http\Controllers\UserController;
// Client:
use App\Http\Controllers\Client\MenuController as ClientMenu;
use App\Http\Controllers\Client\ReservationController as ClientReservation;

// Attendant:
use App\Http\Controllers\Attendant\RoomController as AttendantRoom;
use App\Http\Controllers\Attendant\ClientController as AttendantClient;
use App\Http\Controllers\Attendant\PaymentController as AttendantPayment;
use App\Http\Controllers\Attendant\ReservationController as AttendantReservation;

// Administrator:
use App\Http\Controllers\Administrator\RoomController as AdminRoom;
use App\Http\Controllers\Administrator\MenuController as AdminMenu;
use App\Http\Controllers\Administrator\EmployeeController as AdminEmployee;
use App\Http\Controllers\Administrator\ReservationController as AdminReservation;
use App\Http\Controllers\Administrator\InformController;

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

// Routes for Attendant
Route::group([
        'as' => 'attendant.',
        'prefix' => 'encargado',
        'middleware' => ['auth', 'role:Encargado']
    ],
    function() {
        Route::get('/clientes', [AttendantClient::class, 'index'])->name('clients.index');
        Route::get('/clientes/crear', [AttendantClient::class, 'create'])->name('clients.create');
        Route::get('/habitaciones', [AttendantRoom::class, 'index'])->name('rooms.index');
        Route::get('/reservas', [AttendantReservation::class, 'index'])->name('reservations.index');
        Route::get('/pagos', [AttendantPayment::class, 'index'])->name('payments.index');
    }
);

// Routes for Administrator
Route::group([
        'as' => 'admin.',
        'prefix' => 'administrador',
        'middleware' => ['auth', 'role:Administrador']
    ],
    function() {

        Route::get('/menus', [AdminMenu::class, 'index'])->name('menus.index');
        Route::get('/reservas', [AdminReservation::class, 'index'])->name('reservations.index');
        Route::get('/empleados', [AdminEmployee::class, 'index'])->name('employees.index');
        Route::get('/habitaciones', [AdminRoom::class, 'index'])->name('rooms.index');

        Route::group(['as' => 'reports.', 'prefix' => 'informes'], function() {
            Route::get('/empleados', [InformController::class, 'employees'])->name('employees');
            Route::get('/reservas', [InformController::class, 'reservations'])->name('reservations');
            Route::get('/pagos', [InformController::class, 'payments'])->name('payments');
            Route::get('/ocupacion', [InformController::class, 'occupation'])->name('occupation');
            Route::get('/servicios', [InformController::class, 'services'])->name('services');
        });
    }
);

