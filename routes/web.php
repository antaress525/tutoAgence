<?php

use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
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

Route::get('/', [HomeController::class, 'index']);

Route::get('/property',[BlogController::class,'index'])->name('property.index');
Route::get('/property/{slug}-{property}',[BlogController::class,'show'])->name('property.show')->where(
    ['slug'=>'[0-9a-z\-]+','property'=>'[0-9]+']
);

Route::post('/property/{property}/contact',[BlogController::class,'contact'])->name('property.contact')->where(
    ['property'=>'[0-9]+']
);

Route::get('/login', [AuthController::class, 'login'])
    ->name('login')
    ->middleware('guest');
Route::post('/login', [AuthController::class, 'doLogin']);
Route::delete('/logout', [AuthController::class, 'logout'])
    ->name('logout')
    ->middleware('auth');

Route::prefix('admin/')->name('admin.')->middleware('auth')->group(function(){
    Route::resource('property', PropertyController::class)->except(['show']);
    Route::resource('option', OptionController::class)->except(['show']);
});

