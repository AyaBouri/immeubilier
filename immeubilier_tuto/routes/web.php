<?php
use Illuminate\Support\Facades\Route;
use \App\Http\Controllers\Admin\PropertyController;
use \App\Http\Controllers\Admin\OptionController;
use \App\Http\Controllers\HomController;
use \App\Http\Controllers\AuthController;
use \App\Http\Controllers\HomeController;
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
$idRegex='[0-9]+';
$slugRegex='[0-9a-z\-]+';
Route::get('/', function () {
    return view('/base');
});
//Route::get('/',[HomeController::class,'base']);
Route::get('/biens',[\App\Http\Controllers\PropertyController::class,'index'])->name('property.index');
Route::get('/biens/{slug}-{property}',[\App\Http\Controllers\PropertyController::class,'index'])->name('property.show')->where([
    'property'=> $idRegex,
    'slug'=>$slugRegex
]);
Route::post('/biens/{property}/contact',[PropertyController::class,'contact'])->name('property.contact')->where([
    'property'=>$idRegex,
    //'slug'=>$slugRegex
]);
Route::get('/login',[AuthController::class,'login'])
    ->middleware('guest')
    ->name('login');


Route::post('/login',[AuthController::class,'doLogin']);
Route::delete('/logout',[AuthController::class,'logout'])
    ->middleware('auth')
    ->name('logout');
Route::prefix('admin')->name('admin.')->middleware('auth')->group(function (){
    Route::resource('property',PropertyController::class)->except(['show']);
    Route::resource('option',OptionController::class)->except(['show']);
});
//Auth::routes();
//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
/*Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Auth::routes();
Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
*/
