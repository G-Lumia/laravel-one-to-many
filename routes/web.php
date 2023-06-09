<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;

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
    return view('home');
});

Route::middleware(['auth', 'verified'])->name('admin.')->prefix('admin')->group(function ()
{
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('types', TypeController::class)->parameters(['types' => 'type:slug']);
    Route::resource('projects', ProjectController::class)->parameters(['projects' => 'project:slug']);
});

require __DIR__.'/auth.php';
