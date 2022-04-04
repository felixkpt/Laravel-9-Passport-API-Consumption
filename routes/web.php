<?php

use App\Http\Controllers\BookController;
use Illuminate\Support\Facades\Route;

use Illuminate\Http\Request;
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

Route::middleware(['auth:web'])->group(function() {
    Route::resource('books', BookController::class);
});

Route::get('/dashboard/clients', function (Request $request) {
    // dd($request->user()->clients);
    return view('clients', [
        'clients' => $request->user()->clients
    ]);
})->middleware(['auth'])->name('dashboard.clients');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::resource('people', App\Http\Controllers\PeopleController::class);