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
sasa
Route::get('/', function () {
    
    return view('welcome');
})

Route::get('login','logincontroller@login');

Route::get('register','logincontroller@register');

Route::get('userlist','logincontroller@userlist');
Route::post('loginsubmit','logincontroller@loginsubmit');
Route::post('registersubmit','logincontroller@registersubmit');
Route::get('dashboard',function () {
    //dd('xgf');
    return view('home');
});
