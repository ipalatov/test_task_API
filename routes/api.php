<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\v1\ClientsController;
use App\Http\Controllers\api\v1\CarsController;

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

//Route::middleware('auth:api')->get('/user', function (Request $request) {
//    return $request->user();
//});


Route::prefix('v1')->group(function () {

    Route::resource('/clients', 'api\v1\ClientsController')->only([
        'index', 'show', 'store', 'update', 'destroy'
    ]);

    Route::resource('/cars', 'api\v1\CarsController')->only([
        'index', 'show', 'store', 'update', 'destroy'
    ]);

    Route::get('/clients/{id}/cars', 'api\v1\CarsController@listClientCars');
    Route::get('/cars_parked', 'api\v1\CarsController@listParkedCars');


});



