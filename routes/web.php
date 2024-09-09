<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskController;
use App\Models\Task;

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

Route::controller(TaskController::class)->group(function () {
    
    Route::get('/', 'index')->name('tasks.index');
    Route::post('/tasks', 'store')->name('tasks.store');
    Route::put('/tasks/{task}','modify')->name('tasks.modify');
    Route::delete('/tasks/{task}','destroy')->name('tasks.destroy');
    

});

