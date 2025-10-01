<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VoterController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;

// Register Routes
Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

// Login Routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Dashboard Route
Route::get('/dashboard', function () {
    if (!session()->has('user')) {
        return redirect()->route('login')->with('error', 'Please login first.');
    }

    return view('dashboard');
})->name('dashboard');

// Admin Routes
Route::get('/admin/dashboard', [AdminController::class, 'dashboard']);
Route::get('/admin/elections/create', [AdminController::class, 'createElection']);
Route::post('/admin/elections/store', [AdminController::class, 'storeElection']);
Route::get('/admin/elections/{id}/candidates', [AdminController::class, 'manageCandidates']);
Route::post('/admin/elections/{id}/candidates/store', [AdminController::class, 'storeCandidate']);
Route::get('/admin/elections/{id}/results', [AdminController::class, 'viewResults']);

// Voter Routes
Route::get('/voter/elections', [VoterController::class, 'listElections'])->name('voter.elections');;
Route::post('/voter/elections/{election_id}/vote', [VoterController::class, 'vote']);

Route::post('/voter/elections/{election}/vote', [VoterController::class, 'store'])->name('vote.store');
Route::post('/voter/elections/{election}/vote', [VoterController::class, 'store'])->name('vote.store');


Route::get('/elections', [VoterController::class, 'showElections']);