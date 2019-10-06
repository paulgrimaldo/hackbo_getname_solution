<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group(['middleware' => ['guest']], function () {
    Route::post('generate_process', 'Admin\ProcessesController@generateProcess');
    Route::post('init-process', 'Admin\ProcessesController@initProcess');
    Route::post('end-process', 'Admin\ProcessesController@endProcess');
});