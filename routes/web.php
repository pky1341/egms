<?php

use App\Http\Controllers\EventController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('index');
});
Route::get('/create-event',[EventController::class,'index'])->name('create-event');
Route::post('/store-event', [EventController::class, 'store'])->name('store.event');
