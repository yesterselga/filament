<?php

use App\Http\Livewire\Chat;
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

Route::get('/order', function () {
     return view('order');
});

Route::get('/dine', function () {
     return view('dine');
});

Route::get('/test', function () {
     echo 'hello world';
});

Route::get('/chat', Chat::class);

Route::get('/service', function () {
     return view('service');
})->middleware('auth');
