<?php

use App\Http\Controllers\Admin\optionController;
use App\Http\Controllers\Admin\propertyController;
use App\Http\Controllers\Admin\authController;
use App\Http\Controllers\homeController;
use App\Http\Controllers\propertyController as ControllersPropertyController;
use Illuminate\Support\Facades\Route;


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
$idRegex = '[0-9+]';
$slugRegex = '[0-9a-z\-]+';

Route::get('/', [homeController::class, 'index']);
Route::get('/biens', [App\Http\Controllers\propertyController::class, 'index'])->name('property.index');
Route::get('/biens/{slug}/{property}',[App\Http\Controllers\propertyController::class, 'show'])->name('property.show');
Route::post('/biens/{property}/contact', [App\Http\Controllers\propertyController::class, 'contact'])->name('property.contact');

Route::get('/login', [authController::class, 'login'])->middleware('guest')->name('login');
Route::post('/login', [authController::class, 'doLogin'])->name('login.do');
Route::get('/logout',[authController::class, 'logout'])->name('logout')->middleware('auth');

Route::prefix('/admin')->middleware('auth')->name('admin.')->group(function(){
    Route::resource('property', App\Http\Controllers\Admin\propertyController::class)->except(['show']);
    Route::resource('option', optionController::class)->except(['show']);
});
