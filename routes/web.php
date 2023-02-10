<?php

use App\Models\Coffee;
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

Route::get('/', function () {
    $coffies = Coffee::all();
    return view('home', compact('coffies'));
});



Auth::routes();

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

    //=========================================User======================================

    //==============================Show User==============================
    Route::get('/users', [App\Http\Controllers\Admin\UserController::class, 'index']);

    //==============================Edit User==============================
    Route::middleware(['NotTrialAdmin'])->get('/user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'edit']);

    Route::middleware(['NotTrialAdmin'])->put('/update-user/{user_id}', [App\Http\Controllers\Admin\UserController::class, 'update']);
    //=======================================End User====================================


    //=========================================Account======================================
    
    //=======================================End Account====================================



});
