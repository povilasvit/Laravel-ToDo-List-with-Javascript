<?php
use App\Http\Controllers\todoController;
use App\Http\Controllers\extraController;
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
    return view('welcome');
});

Route::resource('/todo', todoController::class);
Route::post('/todo/{id}/done', [extraController::class, 'done'])->name('todo_done');
Route::post('/todo/clearTaskList', [extraController::class, 'clearTaskList'])->name('clearTaskList');
Route::get('/todo/{id}/editTask', [extraController::class, 'editTask'])->name('editTask');
Route::post('/todo/{todo}', [extraController::class, 'updateTask'])->name('updateTask');