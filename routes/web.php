<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;

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

Route::get('/{path}', function () {
    return view('welcome');
})->where('path','^[a-zA-Z0-9_/]+$');
Route::get('/', function () {
    return view('welcome');
})->where('path','^[a-zA-Z0-9_/]+$');

Route::get('/image/public/product/image/{path}', function ($path) {
    //return Auth::check();
    return response()->file(storage_path() . '/app/public/product/image/' . $path);
});
