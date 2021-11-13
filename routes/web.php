<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\From;
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
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/from', function () {
    return Inertia::render('from');
})->name('from');
Route::post('/from',[From::class, "submit"])->name('frompost');

// Route::get('/file', function () {
//     return Inertia::render('file');
// })->name('file');



Route::get('/file',[From::class, "index"])->name('file');
Route::post('/file',[From::class, "file"])->name('filepost');

require __DIR__.'/auth.php';
