<?php

use App\Http\Controllers\BusController;
use App\Http\Controllers\DriverController;
use App\Http\Controllers\PassengerController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RouteController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\TerminalController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;



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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


// user routes

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::get('/admin/users/create', [UserController::class, 'create'])->name('admin.users.create');
    Route::post('/admin/users', [UserController::class, 'store'])->name('admin.users.store');
    Route::get('/admin/users/{user}', [UserController::class, 'show'])->name('admin.users.show');
    Route::get('/admin/users/{user}/edit', [UserController::class, 'edit'])->name('admin.users.edit');
    Route::put('/admin/users/{user}', [UserController::class, 'update'])->name('admin.users.update');
    Route::delete('/admin/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');
});


//bus routes

Route::middleware(['auth', 'admin', 'agent'])->group(function () {
    Route::get('/admin/buses', [BusController::class, 'index'])->name('admin.buses.index');
    Route::get('/admin/buses/create', [BusController::class, 'create'])->name('admin.buses.create');
    Route::post('/admin/buses', [BusController::class, 'store'])->name('admin.buses.store');
    Route::get('/admin/buses/{bus}', [BusController::class, 'show'])->name('admin.buses.show');
    Route::get('/admin/buses/{bus}/edit', [BusController::class, 'edit'])->name('admin.buses.edit');
    Route::put('/admin/buses/{bus}', [BusController::class, 'update'])->name('admin.buses.update');
    Route::delete('/admin/buses/{bus}', [BusController::class, 'destroy'])->name('admin.buses.destroy');
});


//staff routes

Route::middleware(['auth'])->group(function () {
    Route::get('/admin/staff', [StaffController::class, 'index'])->name('admin.staff.index');
    Route::get('/admin/staff/create', [StaffController::class, 'create'])->name('admin.staff.create');
    Route::post('/admin/staff', [StaffController::class, 'store'])->name('admin.staff.store');
    Route::get('/admin/staff/{staffMember}', [StaffController::class, 'show'])->name('admin.staff.show');
    Route::get('/admin/staff/{staffMember}/edit', [StaffController::class, 'edit'])->name('admin.staff.edit');
    Route::put('/admin/staff/{staffMember}', [StaffController::class, 'update'])->name('admin.staff.update');
    Route::delete('/admin/staff/{staffMember}', [StaffController::class, 'destroy'])->name('admin.staff.destroy');
});


// terminal routes

Route::middleware(['auth', 'admin', 'agent'])->group(function () {
    Route::get('/admin/terminals', [TerminalController::class, 'index'])->name('admin.terminals.index');
    Route::get('/admin/terminals/create', [TerminalController::class, 'create'])->name('admin.terminals.create');
    Route::post('/admin/terminals', [TerminalController::class, 'store'])->name('admin.terminals.store');
    Route::get('/admin/terminals/{terminal}', [TerminalController::class, 'show'])->name('admin.terminals.show');
    Route::get('/admin/terminals/{terminal}/edit', [TerminalController::class, 'edit'])->name('admin.terminals.edit');
    Route::put('/admin/terminals/{terminal}', [TerminalController::class, 'update'])->name('admin.terminals.update');
    Route::delete('/admin/terminals/{terminal}', [TerminalController::class, 'destroy'])->name('admin.terminals.destroy');
});


// route routes

Route::middleware(['auth', 'admin', 'agent'])->group(function () {
    Route::get('/admin/routes', [RouteController::class, 'index'])->name('admin.routes.index');
    Route::get('/admin/routes/create', [RouteController::class, 'create'])->name('admin.routes.create');
    Route::post('/admin/routes', [RouteController::class, 'store'])->name('admin.routes.store');
    Route::get('/admin/routes/{route}', [RouteController::class, 'show'])->name('admin.routes.show');
    Route::get('/admin/routes/{route}/edit', [RouteController::class, 'edit'])->name('admin.routes.edit');
    Route::put('/admin/routes/{route}', [RouteController::class, 'update'])->name('admin.routes.update');
    Route::delete('/admin/routes/{route}', [RouteController::class, 'destroy'])->name('admin.routes.destroy');
});


// driver routes

Route::middleware(['auth', 'admin', 'agent'])->group(function () {
    Route::get('/admin/drivers', [DriverController::class, 'index'])->name('admin.drivers.index');
    Route::get('/admin/drivers/create', [DriverController::class, 'create'])->name('admin.drivers.create');
    Route::post('/admin/drivers', [DriverController::class, 'store'])->name('admin.drivers.store');
    Route::get('/admin/drivers/{driver}', [DriverController::class, 'show'])->name('admin.drivers.show');
    Route::get('/admin/drivers/{driver}/edit', [DriverController::class, 'edit'])->name('admin.drivers.edit');
    Route::put('/admin/drivers/{driver}', [DriverController::class, 'update'])->name('admin.drivers.update');
    Route::delete('/admin/drivers/{driver}', [DriverController::class, 'destroy'])->name('admin.drivers.destroy');
});


// payment routes


Route::middleware(['auth', 'admin', 'agent'])->group(function () {
    Route::get('/admin/payments', [PaymentController::class, 'index'])->name('admin.payments.index');
    Route::get('/admin/payments/create', [PaymentController::class, 'create'])->name('admin.payments.create');
    Route::post('/admin/payments', [PaymentController::class, 'store'])->name('admin.payments.store');
    Route::get('/admin/payments/{payment}', [PaymentController::class, 'show'])->name('admin.payments.show');
    Route::get('/admin/payments/{payment}/edit', [PaymentController::class, 'edit'])->name('admin.payments.edit');
    Route::put('/admin/payments/{payment}', [PaymentController::class, 'update'])->name('admin.payments.update');
    Route::delete('/admin/payments/{payment}', [PaymentController::class, 'destroy'])->name('admin.payments.destroy');
});


// ticket routes


Route::middleware(['auth', 'admin', 'agent'])->group(function () {
    Route::get('/admin/tickets', [TicketController::class, 'index'])->name('admin.tickets.index');
    Route::get('/admin/tickets/create', [TicketController::class, 'create'])->name('admin.tickets.create');
    Route::post('/admin/tickets', [TicketController::class, 'store'])->name('admin.tickets.store');
    Route::get('/admin/tickets/{ticket}', [TicketController::class, 'show'])->name('admin.tickets.show');
    Route::get('/admin/tickets/{ticket}/edit', [TicketController::class, 'edit'])->name('admin.tickets.edit');
    Route::put('/admin/tickets/{ticket}', [TicketController::class, 'update'])->name('admin.tickets.update');
    Route::delete('/admin/tickets/{ticket}', [TicketController::class, 'destroy'])->name('admin.tickets.destroy');
});


// passenger routes


Route::middleware(['auth', 'admin', 'agent'])->group(function () {
    Route::get('/admin/passengers', [PassengerController::class, 'index'])->name('admin.passengers.index');
    Route::get('/admin/passengers/create', [PassengerController::class, 'create'])->name('admin.passengers.create');
    Route::post('/admin/passengers', [PassengerController::class, 'store'])->name('admin.passengers.store');
    Route::get('/admin/passengers/{passenger}', [PassengerController::class, 'show'])->name('admin.passengers.show');
    Route::get('/admin/passengers/{passenger}/edit', [PassengerController::class, 'edit'])->name('admin.passengers.edit');
    Route::put('/admin/passengers/{passenger}', [PassengerController::class, 'update'])->name('admin.passengers.update');
    Route::delete('/admin/passengers/{passenger}', [PassengerController::class, 'destroy'])->name('admin.passengers.destroy');
});





require __DIR__ . '/auth.php';
