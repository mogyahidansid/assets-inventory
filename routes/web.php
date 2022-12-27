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
    return redirect()->route('login');
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


Route::prefix('/admin')
    ->middleware([
        'auth:sanctum',
        config('jetstream.auth_session'),
        'verified',
        'admin',
    ])
    ->group(function () {
        Route::get('/dashboard', fn () => view('admin.dashboard'))->name('admin.dashboard');
        Route::get('/assets', fn () => view('admin.asset'))->name('admin.asset');
        Route::get('/request-assets', fn () => view('admin.request'))->name('admin.request');
        Route::get('/borrowed-assets', fn () => view('admin.borrow'))->name('admin.borrow');
        Route::get('/request-assets/{id}', fn () => view('admin.manage-request'))->name('admin.manage-request');

        Route::get('/profile', fn () => view('admin.profile'))->name('admin.profile');
        Route::get('/borrowers', fn () => view('admin.borrowers'))->name('admin.borrowers');
        Route::get('/reports', fn () => view('admin.reports'))->name('admin.reports');
        Route::get('/ledger', fn () => view('admin.ledger'))->name('admin.ledger');
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
        Route::get('/dashboard', fn () => view('employee.dashboard'))->name('employee.dashboard');
        Route::get('/requests', fn () => view('employee.request'))->name('employee.request');
        Route::get(
            '/transaction-history',
            fn () => view('employee.history')
        )->name('employee.history');

        Route::get('/profile', fn () => view('employee.profile'))->name('employee.profile');
    });
