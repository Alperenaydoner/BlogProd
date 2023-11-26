<?php

use App\Http\Controllers\UserProfile;
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
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/edit', [UserProfile::class, 'edit'])->name('edit');
    Route::post('/update', [UserProfile::class, 'update'])->name('update');
});

require __DIR__.'/auth.php';
