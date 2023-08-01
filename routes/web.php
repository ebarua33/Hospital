<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

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

Route::get('/', [HomeController::class, 'index']);
Route::get('/home', [HomeController::class, 'redirect']);

Route::get('/add_doctor_view', [AdminController::class, 'addview']);
Route::post('/upload_doctor', [AdminController::class, 'upload']);
Route::post('/appointment', [HomeController::class, 'appointment']);
Route::get('/myappointment', [HomeController::class, 'myappointment']);
Route::get('/cancel_appoint/{id}', [HomeController::class, 'cancelAppoint']);
Route::get('/room', [AdminController::class, 'roomReserve']);
Route::get('/generalac', [AdminController::class, 'generalac']);
Route::get('/generalnonac', [AdminController::class, 'generalnonac']);
Route::get('/privateac', [AdminController::class, 'privateac']);
Route::get('/privatenonac', [AdminController::class, 'privatenonac']);
Route::get('/vip', [AdminController::class, 'vip']);
Route::get('/showappointment', [AdminController::class, 'showappointment']);
Route::get('/approved/{id}', [AdminController::class, 'approved']);
Route::get('/canceled/{id}', [AdminController::class, 'canceled']);
Route::get('/showdoctor', [AdminController::class, 'showdoctor']);
Route::get('/update_doctor/{id}', [AdminController::class, 'updatedoctor']);
Route::get('/delete_doctor/{id}', [AdminController::class, 'deletedoctor']);
Route::get('/reserve', [AdminController::class, 'reserve']);
Route::get('/patientlist', [AdminController::class, 'patientlist']);
Route::post('/upload_reservation', [AdminController::class, 'uploadreservation']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
