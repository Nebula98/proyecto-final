<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\UserController; //luis
use App\Http\Controllers\ProgramController; //Luis
use App\Http\Controllers\CourseController;//Luis
use App\Http\Controllers\GroupController;//Luis
use App\Http\Controllers\DocumentController;//Luis

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Inertia 
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/users/create', function () {
        return Inertia::render('Users/Create');
    })->name('users.create');

    Route::post('/users', [UserController::class, 'store'])->name('users.store');
});

require __DIR__.'/auth.php';

// //Luis */

// Route::middleware(['auth', 'role:admin'])->group(function () {
//     // Usuarios
//     Route::resource('users', UserController::class);

//     // Programas
//     Route::resource('programs', ProgramController::class);

//     // Cursos
//     Route::resource('courses', CourseController::class);

//     // Grupos
//     Route::resource('groups', GroupController::class);

//     // Documentos
//     Route::resource('documents', DocumentController::class);
// });