<?php

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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('encuesta/{userId}/{processId}', 'Client\SurveyController@getSurveyView')->name('encuestas.fill');
Route::get('mis-procesos', "Client\ProcessesController@listMyProcesses")->name('procesos.index');
Route::get('mis-procesos/{process}', "Client\ProcessesController@show")->name('procesos.show');
Route::post('encuesta', 'Client\SurveyController@store')->name('survey.store');

Route::get('/admin', 'Admin\AdminController@loadAdmin')->name('admin');
Route::get('/admin/reporte/empleados', 'Admin\AdminController@loadEmpleados')->name('reportes.empleados');
Route::get('/admin/reporte/emociones', 'Admin\AdminController@loadEmociones')->name('reportes.emotions');