<?php

use App\Http\Controllers\RatingController;
use App\Http\Controllers\ProfileController;
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

/**
 * Routes for Ratings
 * GET POST UPDATE DESTROY INFO
 */
Route::get('/ratings',
    [\App\Http\Controllers\RatingController::class, 'index']
)->name('ratings.index');

// http(s)://domain.com/ratings/2
Route::get('/ratings/{id}',
    [\App\Http\Controllers\RatingController::class, 'show']
)->name('ratings.show');

/**
 * Routes for Word Types
 *
 */
Route::get('/wordtypes',
    [\App\Http\Controllers\WordTypeController::class, 'index']
)->name('wordtypes.index');

Route::get('/wordtypes/{wordType}',
    [\App\Http\Controllers\WordTypeController::class, 'show']
)->name('wordtypes.show');


/* --------------------------------------------- */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/ratings', [RatingController::class, 'index'])->name('ratings.index');
Route::get('/ratings/{rating}', [RatingController::class, 'show'])->name('ratings.show');

Route::get('/ratings/{rating}/edit', [RatingController::class, 'edit'])->name('ratings.edit');
Route::get('/ratings/{rating}/delete', [RatingController::class, 'delete'])->name('ratings.delete');

Route::patch('/ratings/{rating}', [RatingController::class, 'update'])->name('ratings.update');
Route::put('/ratings/{rating}', [RatingController::class, 'update'])->name('ratings.update');


require __DIR__ . '/auth.php';
