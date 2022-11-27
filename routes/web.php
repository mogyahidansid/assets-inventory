<?php

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

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        $role_id = auth()->user()->role;
        switch ($role_id) {
            case 1:
                // return redirect('/admin');
                return redirect()->route('admin.dashboard');
                break;
            case 0:
                return redirect()->route('employee.dashboard');
                break;
            default:
                abort(403);
                break;
        }
    })->name('dashboard');
});

// Admin Routes

Route::prefix('/admin')
    ->middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
        'admin',
    ])
    ->group(function () {
        Route::get('/dashboard', fn() => view('admin.dashboard'))->name(
            'admin.dashboard'
        );
    });

// Employee Routes

Route::prefix('/employee')
    ->middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
        'employee',
    ])
    ->group(function () {
        Route::get('/dashboard', fn() => view('employee.dashboard'))->name(
            'employee.dashboard'
        );
    });
