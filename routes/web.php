<?php

use App\Http\Controllers\OwnerController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

use App\Http\Controllers\HomeController;

route::get('/', [AdminController::class, 'home']);


route::get('/home', [AdminController::class, 'index'])->name('home');


route::get('/create_room', [OwnerController::class, 'create_room']);
route::post('/add_room', [OwnerController::class, 'add_room']);
route::get('/view_room', [OwnerController::class, 'view_room']);
route::get('/room_delete/{id}', [OwnerController::class, 'room_delete']);
route::get('/room_update/{id}', [OwnerController::class, 'room_update']);
route::post('/edit_room/{id}', [OwnerController::class, 'edit_room']);
route::get('/room_details/{id}', [HomeController::class, 'room_details']);
route::post('/add_booking/{id}', [HomeController::class, 'add_booking']);
route::get('/bookings', [OwnerController::class, 'bookings']);
route::get('/delete_booking/{id}', [OwnerController::class, 'delete_booking']);
route::get('/approve_book/{id}', [OwnerController::class, 'approve_book']);
route::get('/reject_book/{id}', [OwnerController::class, 'reject_book']);


Route::get('/approval_room', [AdminController::class, 'approval_room']);


route::get('/approve_post/{id}', [AdminController::class, 'approve_post']);
route::get('/reject_post/{id}', [AdminController::class, 'reject_post']);
route::get('/view_admin_room', [AdminController::class, 'view_admin_room']);

route::get('/our_rooms', [HomeController::class, 'our_rooms']);

