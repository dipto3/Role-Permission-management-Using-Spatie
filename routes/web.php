<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\RoleController;

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [DashboardController::class, 'index'])->name('admin.index');
Route::get('/roles', [RoleController::class, 'index'])->name('role.index');

Route::get('/roles-create', [RoleController::class, 'create'])->name('role.index');
Route::post('/roles-store', [RoleController::class, 'store'])->name('role.store');
Route::get('/roles-edit/{id}', [RoleController::class, 'edit'])->name('role.edit');
Route::post('/roles-update/{id}', [RoleController::class, 'update'])->name('role.update');
Route::post('/roles-delete/{id}', [RoleController::class, 'destroy'])->name('role.destroy');

