<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacilityController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\UserController;
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

/**  LOGIN, LOGOUT, REGISTER **/
Route::get('/login', [LoginController::class, 'showLoginForm'])->middleware('guest')->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');
Route::get('/registration', [UserController::class, 'registration'])->middleware('guest')->name('registration');
Route::post('/registration', [UserController::class, 'saveRegistration']);

/** CUSTOMER **/

/** DASHBOARD **/
Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
Route::get('/about', [DashboardController::class, 'aboutUs'])->name('about');
Route::get('/contact', [DashboardController::class, 'contactUs'])->name('contact');
Route::get('/booking', [DashboardController::class, 'booking'])->name('booking');
Route::get('/gallery', [DashboardController::class, 'gallery'])->name('gallery');

Route::group(['middleware' => ['auth', 'role:ADMIN|CUSTOMER']], function() {
    /** BOOKING KAMAR **/
    Route::group(['prefix' => 'booking'], function() {
        Route::get('/{slug}/', [BookingController::class, 'bookingRoom'])->name('booking-room');
        Route::post('/{slug}/', [BookingController::class, 'bookingRoomDetail'])->name('booking-room-detail');
        Route::post('/{slug}/booked/', [BookingController::class, 'bookingRoomSave'])->name('booking-room-save');
    });

    /** STATUS PEMESANAN **/
    Route::get('/booking-list', [BookingController::class, 'bookingListCustomer'])->name('booking-list');

    /** PRINT NOTA PEMBAYARAN/BOOKING **/
    Route::get('/booking-print/{id}', [BookingController::class, 'printNotaBooking'])->name('booking-print');
});

/*********************************************************************************************************************************/

/** ADMIN **/
Route::group([
                'middleware' => ['auth', 'role:ADMIN'],
                'prefix' => 'admin', 
                'as' => 'admin.'
            ], function() {

    /** PENGGUNA **/
    Route::group(['prefix' => 'pengguna', 'as' => 'pengguna.'], function() {
        Route::get('/', [UserController::class, 'listPengguna'])->name('index');
        Route::get('/create', [UserController::class, 'createPengguna'])->name('create');
        Route::post('/create', [UserController::class, 'storePengguna'])->name('store');
        Route::get('/{id}/edit', [UserController::class, 'editPengguna'])->name('edit');
        Route::put('/{id}/update', [UserController::class, 'updatePengguna'])->name('update');
    });

    /** GALLERY **/
    Route::group(['prefix' => 'gallery', 'as' => 'gallery.'], function() {
        Route::get('/', [GalleryController::class, 'indexGallery'])->name('index');
        Route::get('/create', [GalleryController::class, 'createGallery'])->name('create');
        Route::post('/create', [GalleryController::class, 'storeGallery'])->name('store');
        Route::get('/{id}/edit', [GalleryController::class, 'editGallery'])->name('edit');
        Route::put('/{id}/update', [GalleryController::class, 'updateGallery'])->name('update');
        Route::get('/{id}/delete', [GalleryController::class, 'destroyGallery'])->name('delete');
    });

    /** FACILITY **/
    Route::group(['prefix' => 'facility', 'as' => 'facility.'], function() {
        Route::get('/', [FacilityController::class, 'indexFacility'])->name('index');
        Route::get('/create', [FacilityController::class, 'createFacility'])->name('create');
        Route::post('/create', [FacilityController::class, 'storeFacility'])->name('store');
        Route::get('/{id}/edit', [FacilityController::class, 'editFacility'])->name('edit');
        Route::put('/{id}/update', [FacilityController::class, 'updateFacility'])->name('update');
        Route::get('/{id}/delete', [FacilityController::class, 'destroyFacility'])->name('delete');
    });

    /** ROOM **/
    Route::group(['prefix' => 'room', 'as' => 'room.'], function() {
        Route::get('/', [RoomController::class, 'indexRoom'])->name('index');
        Route::get('/create', [RoomController::class, 'createRoom'])->name('create');
        Route::post('/create', [RoomController::class, 'storeRoom'])->name('store');
        Route::get('/{id}', [RoomController::class, 'showRoom'])->name('show');
        Route::get('/{id}/edit', [RoomController::class, 'editRoom'])->name('edit');
        Route::put('/{id}/update', [RoomController::class, 'updateRoom'])->name('update');
        Route::get('/{id}/facility/{facility_id}', [RoomController::class, 'processRoomFacility'])->name('process-facility');
    });

    /** BOOKING LIST CUSTOMER **/
    Route::group(['prefix' => 'booking-list', 'as' => 'booking-list.'], function() {
        Route::get('/customer', [BookingController::class, 'bookingListAdmin'])->name('customer');
        Route::get('/customer/{id}', [BookingController::class, 'transactionAggrement'])->name('transaction-aggrement');
    });
});

// Auth::routes();