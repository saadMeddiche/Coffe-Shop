<?php

use Illuminate\Support\Facades\Auth;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function () {
    return view('home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::prefix('admin')->middleware(['isAdmin'])->group(function () {

    Route::get('/dashboard', [App\Http\Controllers\Admin\DashboardController::class, 'index']);

    //=========================================Coffee======================================

    //==============================Show Coffee==============================
    Route::get('/coffee', [App\Http\Controllers\Admin\coffeeController::class, 'index']);

    //==============================Add Coffee==============================
    Route::get('/add-coffee', [App\Http\Controllers\Admin\coffeeController::class, 'create']);

    Route::post('/add-coffee', [App\Http\Controllers\Admin\coffeeController::class, 'store']);

    //==============================Edit Coffee==============================
    Route::get('/edit-coffee/{coffee_id}', [App\Http\Controllers\Admin\coffeeController::class, 'edit']);

    Route::put('/update-coffee/{coffee_id}', [App\Http\Controllers\Admin\coffeeController::class, 'update']);

    //==============================Delete Coffee==============================
    Route::get('/delete-coffee/{coffee_id}', [App\Http\Controllers\Admin\coffeeController::class, 'destroy']);

    //=========================================End Coffee======================================


});
