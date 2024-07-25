<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SurveyController;
use Illuminate\Support\Facades\Route;
use App\Http\Livewire\SurveyForm;

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

Route::post('/survey/{id}', [SurveyController::class, 'index'])->name('survey');
Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/surveys/status/{status}', [SurveyController::class, 'showByStatus'])->name('survey.showByStatus');
Route::post('/survey', [SurveyController::class, 'submit'])->name('survey.submit');
// Route::post('/survey/submit', [SurveyController::class, 'submit'])->name('survey.submit');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
