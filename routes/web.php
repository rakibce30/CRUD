<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentsController;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [StudentsController::class, 'index'])->name('dashboard');
    Route::post('/students', [StudentsController::class, 'store']);
    Route::post('/students', [StudentsController::class, 'store']);
    Route::post('/students/update', [StudentsController::class, 'update'])->name('student.update');
    Route::post('/students/delete', [StudentsController::class, 'destory'])->name('student.delete');

});
