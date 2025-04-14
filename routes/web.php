<?php

use App\Http\Controllers\ListUsersController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\RoomController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\BookingController;


Route::get('/add', function () {
    return view('admin.add_rooms');
});
Route::get('/register', [RegisterController::class, 'index'])->name('registrasi');
    Route::post('/register', [RegisterController::class, 'create']);
    // Jika kamu ingin menambahkan room
Route::post('/tambah', [RoomController::class, 'store'])->name('room');

// Kalau form-nya dari route /tambah (GET)
Route::get('/tambah', [RoomController::class, 'create']);
Route::get('/users', [ListUsersController::class, 'showUser'])->name('list_users');
Route::delete('/users/{id}', [ListUsersController::class, 'destroy'])->name('users.destroy');
Route::get('/api/total-users', function () {
    $total = DB::table('users')->count();
    return response()->json(['total_users' => $total]);
});
Route::get('/edit', function () {
    return view('admin.user_edit');
});
Route::put('/users/{id}', [ListUsersController::class, 'update'])->name('users.update');
Route::get('/rooms', [RoomController::class, 'index'])->name('rooms.index');
Route::delete('/rooms/{id}', [RoomController::class, 'delete'])->name('room.destroy');
Route::get('/api/total-rooms', function () {
    $total = DB::table('rooms')->count();
    return response()->json(['total_rooms' => $total]);
});
Route::put('/rooms/{id}', [RoomController::class, 'update'])->name('rooms.update');
Route::get('/Rooms', function () {
    return view('users.rooms');
});
Route::get('/home', function () {
    $rooms = App\Models\Room::all();
    return view('users.home', compact('rooms'));
});
Route::post('/booking', [BookingController::class, 'store'])->name('booking.store');
