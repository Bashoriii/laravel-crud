<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DependantDropdownController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('sample');
});

Route::get('/table', [EmployeeController::class, 'index'])->name('table.index');
Route::get('/table/create', [EmployeeController::class, 'create'])->name('table.create');
Route::post('/table', [EmployeeController::class, 'store'])->name('table.store');
Route::get('/table/{table}/edit', [EmployeeController::class, 'edit'])->name('table.edit');
Route::put('/table/{table}/update', [EmployeeController::class, 'update'])->name('table.update');
Route::delete('/table/{table}/delete', [EmployeeController::class, 'delete'])->name('table.delete');

Route::get('provinces', [DependantDropdownController::class, 'provinces'])->name('provinces');
Route::get('cities', [DependantDropdownController::class, 'cities'])->name('cities');
