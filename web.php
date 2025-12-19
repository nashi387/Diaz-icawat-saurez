<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmployeeController;
use App\Http\Middleware\CheckAdmin;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/greetings', [EmployeeController::class, 'greetings']);

// Public routes - anyone can register
Route::get('/register', [EmployeeController::class, 'showForm']);
Route::post('/submit', [EmployeeController::class, 'processForm']); 

// Admin protected routes - only admins can access
Route::middleware(['admin.check'])->group(function () {
    // Employee list
    Route::get('/employees', [EmployeeController::class, 'listEmployees'])->name('employees.list');
    
    // Edit employee
    Route::get('/employees/{id}/edit', [EmployeeController::class, 'edit'])->name('employees.edit');
    
    // Update employee - using POST
    Route::post('/employees/{id}/update', [EmployeeController::class, 'update'])->name('employees.update');
    
    // Delete employee - using POST (not GET or DELETE)
    Route::post('/employees/{id}/delete', [EmployeeController::class, 'destroy'])->name('employees.delete');
});

// Role simulation routes
Route::get('/set-admin', function(){
    session(['role' => 'admin']);
    return 'You are now admin!';
});

Route::get('/set-user', function (){
    session(['role' => 'user']);
    return 'You are now a regular user!';
});