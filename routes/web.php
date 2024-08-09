<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MembershipController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\PayrollController;

Route::get('/', function () {
    return view('welcome');
});


Route::resource('users', UserController::class);
Route::resource('memberships', MembershipController::class);

Route::resource('employees', EmployeeController::class);


Route::get('payrolls/create', [PayrollController::class, 'create'])->name('payrolls.create');
Route::post('payrolls', [PayrollController::class, 'store'])->name('payrolls.store');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
