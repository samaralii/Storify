<?php

use App\Http\Controllers\StoriesController;
use Faker\Guesser\Name;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Route::get('/', [\App\Http\Controllers\Auth\LoginController::class, 'showLoginForm']);

Route::middleware(['auth'])->group(function () {
    // Route::get('/stories', [App\Http\Controllers\StoriesController::class, 'index'])->name('stories.index');
    // Route::get('/stories/{story}', [App\Http\Controllers\StoriesController::class, 'show'])->name('stories.show');
    // Route::resource('stories', StoriesController::class);
    Route::resource('stories', StoriesController::class);
});

Route::get('/', [\App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.index');
Route::get('/story/{activeStory:slug}', [\App\Http\Controllers\DashboardController::class, 'show'])->name('dashboard.show');


Route::get('/email', [\App\Http\Controllers\DashboardController::class, 'email'])->name('dashboard.email');
