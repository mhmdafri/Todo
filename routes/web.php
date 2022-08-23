<?php

use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use PHPUnit\TextUI\XmlConfiguration\Group;

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

// Route::get('/', function () {return view('welcome');});
//HomeController
Route::get ('/', [Homecontroller::class,"index"])->name('home');


//ToDoControllerGroup
Route::prefix('/todo')->group(function (){
Route::get ('/', [TodoController::class,"index"])->name('todo');
Route::post ('/store', [TodoController::class,"store"])->name('todo.store');
Route::get ('/{task id}/delete', [TodoController::class,"delete"])->name('todo.delete');
Route::get ('/{task id}/done', [TodoController::class,"done"])->name('todo.done');

});
