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
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        switch (auth()->user()->role) {
            case 0:
                return redirect('/');
                break;
            case 1:
                return redirect('/employee');
                break;
            default:
                abort(403);
                break;
        }
    })->name('dashboard');
});

// Admin Routes
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/', fn () => view('admin/dashboard'))->name('admin.dashboard');
});

// Employee Routes
Route::group(['prefix' => 'employee', 'middleware' => ['auth', 'employee']], function () {
    Route::get('/', fn () => view('employee/dashboard'))->name('employee.dashboard');
});
