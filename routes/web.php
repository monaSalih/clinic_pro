<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\DoctorSchedulesController;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [DoctorSchedulesController::class, 'view_home'])->name('user.home');


Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/patiant_page', [HomeController::class, 'patiant_view'])->name('patient.home');
Route::get('/doctor_page', [HomeController::class, 'doctor_view'])->name('doctor.home');

Route::middleware(['auth'])->group(function () {
    Route::get('/patient/book-appointment', [PatientController::class, 'bookAppointment'])
        ->name('patient.book');

    // Route::post('/patient/book-appointment', [PatientController::class, 'storeAppointment'])
    //     ->name('patient.book.store');
});
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/dashboard', function () {
    return view('dashboard');
      })->name('dashboard');
    // Users CRUD
    Route::resource('users', UserController::class);

    // Doctors CRUD
    Route::resource('doctors', DoctorController::class);
    Route::get('schedules', [DoctorSchedulesController::class, 'index'])
    ->name('schedules.index');
});