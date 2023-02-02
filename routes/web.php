<?php

use App\Http\Controllers\DashboardController;
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
    return view('index');
});

Route::get('/edit/{id}', function () {
    return view('project.edit');
});

Route::get('/', [DashboardController::class, 'index']);
Route::get('/create', [DashboardController::class, 'create']);
Route::post('/project_create', [DashboardController::class, 'store']);
Route::put('/update/{id}', [DashboardController::class, 'update']);
Route::delete('/delete/{id}', [DashboardController::class, 'destroy']);
Route::delete('/delete_all', [DashboardController::class, 'destroyAll'])->name('project.deleteAll');

