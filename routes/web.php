<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RatingController;
use App\Http\Controllers\WordController;
use App\Http\Controllers\WordTypeController;
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
})->name('home');

/**
 * Routes for Word Types
 */
Route::get('/wordtypes',
    [WordTypeController::class, 'index']
)->name('wordtypes.index');

Route::get('/wordtypes/{wordType}',
    [WordTypeController::class, 'show']
)->name('wordtypes.show');

Route::get('/words',
    [WordController::class, 'index']
)->name('words.index');

/* --------------------------------------------- */

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


/**
 * Routes for Ratings
 * GET POST UPDATE DESTROY INFO
 */

// GET: Index, Add/Create
//Route::get('/ratings', [RatingController::class, 'index'])->name('ratings.index');
//Route::get('/ratings/add', [RatingController::class, 'create'])->name('ratings.add');
//Route::get('/ratings/create', [RatingController::class, 'create'])->name('ratings.create');

// GET: Show, Edit, Delete {all require an "ID", ie "rating"} - Delete is NON-standard
//Route::get('/ratings/{rating}/edit', [RatingController::class, 'edit'])->name('ratings.edit');
//Route::get('/ratings/{rating}/delete', [RatingController::class, 'delete'])->name('ratings.delete');
//Route::get('/ratings/{rating}', [RatingController::class, 'show'])->name('ratings.show');

// Action routes
// POST: stores the rating
// PATCH/PUT: update the rating details
// DELETE: Destroys the rating
//Route::post('/ratings', [RatingController::class, 'store'])->name('ratings.store');
//Route::delete('/ratings/{rating}', [RatingController::class, 'destroy'])->name('ratings.destroy');
//Route::patch('/ratings/{rating}', [RatingController::class, 'update'])->name('ratings.update');
//Route::put('/ratings/{rating}', [RatingController::class, 'update'])->name('ratings.update');

// Not authenticated access
Route::resource('ratings', RatingController::class)->only(['index', 'show']);
//Route::resource('wordtypes', WordTypeController::class)->only(['index', 'show']);


// Must be authenticated
Route::middleware('auth')->group(function () {
    Route::resource('ratings', RatingController::class)->except(['index', 'show']);
    Route::get('/ratings/{rating}/delete', [RatingController::class, 'delete'])->name('ratings.delete');

//    Route::resource('wordtypes', WordTypeController::class)->except(['index', 'show']);
//    Route::get('/wordtypes/{wordType}/delete', [WordTypeController::class, 'delete'])->name('wordtypes.delete');
});


require __DIR__.'/auth.php';

Route::get('/force-styles', function () {
    return view('force-styles');
});
