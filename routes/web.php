<?php

use App\Http\Controllers\UserController;
// Client:
use App\Http\Controllers\Client\MenuController as ClientMenu;
use App\Http\Controllers\Client\CardController as ClientCard;
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
use App\Http\Controllers\Web\ReservationController as WebReservation;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return auth()->check()
        ? redirect()->route('home')
        : view('welcome');;
})->name('welcome');

Route::get('/home', function () {
    return view('home');
})->name('home')->middleware('auth');


// Web (public) routes
Route::group([
        'as' => 'web.',
        'middleware' => ['unpayed.reservations'],
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
        'middleware' => ['auth', 'role:Cliente', 'unpayed.reservations']
    ],
    function() {
        Route::get('/reservas', [ClientReservation::class, 'index'])->name('reservations.index');
        Route::group([
            'excluded_middleware' => ['unpayed.reservations']
        ], function () {
            Route::get('/reservas/{reservation}/pago', [ClientReservation::class, 'goToPayment'])->name('reservations.goToPayment');
            Route::post('/reservas/{reservation}/pago', [ClientReservation::class, 'makePayment'])->name('reservations.makePayment');
            Route::delete('/reservas/{reservation}', [ClientReservation::class, 'destroy'])->name('reservations.destroy');
        });

        Route::get('/tarjetas', [ClientCard::class, 'index'])->name('cards.index');
        Route::delete('/tarjetas/{card}', [ClientCard::class, 'destroy'])->name('cards.destroy');

        Route::get('/menus', [ClientMenu::class, 'index'])->name('menus.index');

        Route::post('/reservando', [ClientReservation::class, 'create'])->name('reservations.create');
        Route::post('/reservando/store', [ClientReservation::class, 'store'])->name('reservations.store');
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
        Route::get('/habitaciones/crear', [AttendantRoom::class, 'create'])->name('rooms.create');

        Route::get('/reservas', [AttendantReservation::class, 'index'])->name('reservations.index');
        Route::get('/reservas/crear', [AttendantReservation::class, 'create'])->name('reservations.create');

        Route::get('/reservas/{reservation}/checkin', [AttendantReservation::class, 'checkin'])->name('reservations.checkin');
        Route::post('/reservas/{reservation}/checkin', [AttendantReservation::class, 'checkinPost'])->name('reservations.checkinPost');
        Route::get('/reservas/{reservation}/checkout', [AttendantReservation::class, 'checkout'])->name('reservations.checkout');

        Route::get('/pagos', [AttendantPayment::class, 'index'])->name('payments.index');
        Route::get('/pagos/crear', [AttendantPayment::class, 'create'])->name('payments.create');
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
        Route::get('/menus/create', [AdminMenu::class, 'create'])->name('menus.create');
        Route::get('/reservas', [AdminReservation::class, 'index'])->name('reservations.index');
        Route::get('/reservas/create', [AdminReservation::class, 'create'])->name('reservations.create');
        Route::get('/empleados', [AdminEmployee::class, 'index'])->name('employees.index');
        Route::get('/empleados/crear', [AdminEmployee::class, 'create'])->name('employees.create');

        Route::get('/habitaciones', [AdminRoom::class, 'index'])->name('rooms.index');
        Route::get('/habitaciones/crear', [AdminRoom::class, 'create'])->name('rooms.create');
        Route::get('/habitaciones/{room}/editar', [AdminRoom::class, 'edit'])->name('rooms.edit');
        Route::put('/habitaciones/{room}', [AdminRoom::class, 'update'])->name('rooms.update');
        Route::post('/habitaciones', [AdminRoom::class, 'store'])->name('rooms.store');

        Route::group(['as' => 'reports.', 'prefix' => 'informes'], function() {
            Route::get('/empleados', [InformController::class, 'employees'])->name('employees');
            Route::get('/reservas', [InformController::class, 'reservations'])->name('reservations');
            Route::get('/pagos', [InformController::class, 'payments'])->name('payments');
            Route::get('/ocupacion', [InformController::class, 'occupation'])->name('occupation');
            Route::get('/servicios', [InformController::class, 'services'])->name('services');
        });
    }
);

