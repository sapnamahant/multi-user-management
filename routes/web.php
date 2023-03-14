<?php

use Illuminate\Support\Facades\Route;

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
    return redirect('/login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/manager', [App\Http\Controllers\ManagerController::class, 'index'])->name('manager');
Route::get('/add-manager', [App\Http\Controllers\ManagerController::class, 'addManager'])->name('add.manager');
Route::post('/add-manager', [App\Http\Controllers\ManagerController::class, 'insert'])->name('add.manager');
Route::get('manager/edit/{id}', [App\Http\Controllers\ManagerController::class, 'edit'])->name('manager.edit');
Route::get('manager/delete/{id}', [App\Http\Controllers\ManagerController::class, 'delete'])->name('manager.delete');

Route::get('/task', [App\Http\Controllers\TaskController::class, 'index'])->name('task');
Route::get('/add-task', [App\Http\Controllers\TaskController::class, 'addtask'])->name('add.task');
Route::post('/add-task', [App\Http\Controllers\TaskController::class, 'insert'])->name('add.task');
Route::get('task/edit/{id}', [App\Http\Controllers\TaskController::class, 'edit'])->name('task.edit');
Route::get('task/delete/{id}', [App\Http\Controllers\TaskController::class, 'delete'])->name('task.delete');

Route::get('/employee', [App\Http\Controllers\EmployeeController::class, 'index'])->name('employee');
Route::get('/add-employee', [App\Http\Controllers\EmployeeController::class, 'add'])->name('add.employee');
Route::post('/add-employee', [App\Http\Controllers\EmployeeController::class, 'insert'])->name('add.employee');
Route::get('employee/edit/{id}', [App\Http\Controllers\EmployeeController::class, 'edit'])->name('employee.edit');
Route::get('employee/delete/{id}', [App\Http\Controllers\EmployeeController::class, 'delete'])->name('employee.delete');