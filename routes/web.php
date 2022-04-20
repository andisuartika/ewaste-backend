<?php

use App\Http\Controllers\PageController;
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
    return view('index');
})->name('welcome');


// USER ROLES
Route::group(['middleware' => 'auth:sanctum'], function() {

    Route::group(['middleware' => 'accessrole:ADMIN'], function() {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    });
    Route::get('/', [PageController::class, 'loadPage'])->name('dashboard');
    Route::get('page/{layout}/{pageName}', [PageController::class, 'loadPage'])->name('page');
});

// Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');
