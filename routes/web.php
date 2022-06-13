<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MappingController;
use App\Http\Controllers\HomeController;
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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/map', [MappingController::class, 'map']);
Route::get('/map-2', [MappingController::class, 'map2']);
Route::get('/map-user', [MappingController::class, 'mapUser']);
Route::get('/cemetery', [MappingController::class, 'cemetery'])->name('cemetery');
Route::get('/people/{cemetery_no}', [MappingController::class, 'getOnePeople'])->name('getOnePeople');
Route::post('/update', [MappingController::class, 'update']);
Route::get('/edit/{cemetery_no}', [MappingController::class, 'edit'])->name('edit');
Route::post('/update', [MappingController::class, 'update']);
Route::post('/reserve', [MappingController::class, 'reserve']);

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/deceased', [HomeController::class, 'deceased'])->name('deceased');


 
    Route::get('/accept/{cemetery_no}', [MappingController::class, 'accept']);
    Route::get('/denied/{cemetery_no}', [MappingController::class, 'denied']);

});


