<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::middleware(['api'])->get('/test',function(Request $request){
//     return 'ok';
// });

Route::prefix('admin')->middleware(['auth:sanctum'])->group(
    function() {
        Route::apiResources([
            'product' => 'ProductController',
        ]);
    }
);

Route::apiResource('product', 'ProductController')->only(['index', 'show']);

Route::post('login','AdminController@login');
Route::middleware(['auth:sanctum'])->get('authenticate/is/admin','AdminController@check');
