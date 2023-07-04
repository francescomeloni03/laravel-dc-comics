<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\resourceController;

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
    $links = config('store.someLinks');
    return view('welcome', compact('links'));
});

Route::get('/otherpage', function () {
    $links = config('store.someLinks');
    return view('other', compact('links'));
});




Route::get('/', [resourceController::class, 'index'])->name('home');
Route::get('//create', [resourceController::class, 'create'])->name('nome-route.create');
Route::post('/', [resourceController::class, 'store'])->name('nome-route.store');
Route::get('//{id}', [resourceController::class, 'show'])->name('nome-route.show');


Route::resource('comics', resourceController::class);



