<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class, 'home']);
Route::get('/home', [HomeController::class, 'homeRedirect'])->middleware('auth', 'verified');
Route::get('/add-doctor-view', [AdminController::class, 'adminDoctorAdd']);
Route::post('/doctor-details-save', [AdminController::class, 'doctorData']);
Route::post('/appointment', [HomeController::class, 'makeAppoinment']);
Route::get('/myAppointment', [HomeController::class, 'myAppointment']);
Route::get('/cancelAppointment/{id}', [HomeController::class, 'cancelAppointment']);
Route::get('/deleteDoctor/{id}', [AdminController::class, 'deleteDoctor']);
Route::get('/admin-appointment-handle', [AdminController::class, 'adminAppointmentHandle']);
Route::get('/admin-approve-appointment/{id}', [AdminController::class, 'adminApproveAppointment']);
Route::get('/admin-cancel-appointment/{id}', [AdminController::class, 'adminCancelAppointment']);

// some pages
Route::get('/about-us', [HomeController::class, 'aboutUsPage']);
Route::get('/doctors-page', [HomeController::class, 'doctorPage']);
Route::get('/contacts', [HomeController::class, 'contactPage']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
