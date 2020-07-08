<?php

use App\Http\Controllers\logincontroller;
use App\Http\Controllers\TodoController;
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

Route::get('login','logincontroller@login');

Route::get('register','logincontroller@register');

Route::get('userlist','logincontroller@userlist');
Route::post('loginsubmit','logincontroller@loginsubmit');
Route::post('registersubmit','logincontroller@registersubmit');
Route::get('dashboard','logincontroller@dashboard');


Route::post('upload','logincontroller@uploadFile');
Route::get('/download/{file_name}','logincontroller@downloadFile');

Route::get('/todos','TodoController@index');
Route::get('/todos/{id}/edit','TodoController@edit');
Route::get('/todos/{id}/completed','TodoController@completed')->name('completed');
Route::get('/todos/{id}/delete','TodoController@delete');
Route::patch('/todos/{id}/edit','TodoController@updateTodo'); //->name('todos.edit');
Route::get('/todos/create','TodoController@create');
Route::post('/todos/create','TodoController@store');
Route::post('/todos/gofile','TodoController@gofilesubmit');
Route::get('/todos/gofile','TodoController@gofileload');
Route::get('/todos/gofiledownload/{code?}/','TodoController@gofiledownload')->name('todos');

