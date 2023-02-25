<?php

use App\Http\Controllers\SiswaController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);
Route::get('/siswas', [SiswaController::class, 'index'])->middleware('auth');
Route::get('/siswas/create', [SiswaController::class, 'create'])->middleware('Guru');
Route::get('/siswas/{id}', [SiswaController::class, 'show'])->middleware('Guru');
Route::post('/siswas', [SiswaController::class, 'store'])->middleware('Guru');
route::get('/siswas/{id}/edit', [SiswaController::class, 'edit'])->middleware('Guru');
Route::patch('/siswas/{id}', [SiswaController::class, 'update'])->middleware('Guru');
Route::delete('/siswas/{id}', [SiswaController::class, 'delete'])->middleware('Guru');


