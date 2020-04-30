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
    return view('auth.login');
});

Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');

Route::get('/home', 'UserController@index')->name('homeUser');

//Rutas referentes a ejercicios
Route::get('/listEjercicios', 'EjercicioController@index')->name('ejercicios.list');
Route::get('/createEjercicio','EjercicioController@createEjercicio')->name('ejercicios.crear');
Route::get('/editEjercicio/{id}','EjercicioController@edit')->name('ejercicios.editar');
Route::post('/storeEjercicio','EjercicioController@storeEjercicio')->name('ejercicios.store');
Route::put('/updateEjercicio/{id}','EjercicioController@update')->name('ejercicios.update');
Route::delete('/deleteEjercicio/{id}','EjercicioController@destroy')->name('ejercicios.destroy');

Route::get('/getEjercicios', 'EjercicioController@getListEjercicios')->name('ejercicios.getList');
Route::get('/searchEjercicio/{search}', 'EjercicioController@searchEjercicio')->name('ejercicios.search');

//Rutas referentes a entrenamientos
Route::get('/listaEntrenamiento', 'EntrenamientoController@index')->name('entrenamientos.list');
Route::get('/createEntrenamiento','EntrenamientoController@createEntrenamiento')->name('entrenamientos.crear');
Route::get('/editEntrenamiento/{id}','EntrenamientoController@edit')->name('entrenamientos.editar');
Route::get('/showEntrenamiento/{id}','EntrenamientoController@show')->name('entrenamientos.show');
Route::post('/storeEntrenamiento','EntrenamientoController@storeEntrenamiento')->name('entrenamientos.store');
Route::put('/updateEntrenamiento/{id}','EntrenamientoController@update')->name('entrenamientos.update');
Route::delete('/deleteEntrenamiento/{id}','EntrenamientoController@destroy')->name('entrenamientos.destroy');
Route::get('/getEntrenamientos', 'UserController@getEntrenamientos')->name('entrenamientos.get');

Route::get('/getEjercicios/{entrenamientoid}','EntrenamientoController@getEjercicios')->name('entrenamientos.getEjercicios');
Route::get('/addEjercicio/{entrenamientoid}/{ejercicioid}/{num_series}/{num_repes}','EntrenamientoController@addEjercicio')->name('entrenamientos.addEjercicio');
Route::get('/saveEjercicio/{entrenamientoid}/{ejercicioid}/{num_series}/{num_repes}','EntrenamientoController@saveEjercicio')->name('entrenamientos.saveEjercicio');
Route::get('/dropEjercicio/{entrenamientoid}/{ejercicioid}','EntrenamientoController@dropEjercicio')->name('entrenamientos.dropEjercicio');

Route::get('/downloadPDF/{id}','EntrenamientoController@downloadPDF');


//Rutas referentes a clientes
Route::get('/homeClientes', 'UserController@homeClientes')->name('clientes.home');
Route::get('/listaClientes', 'UserController@listClientes')->name('clientes.list');
Route::get('/asignEntrenamiento/{entrenamientoid}/{userid}', 'UserController@asignEntrenamiento')->name('cliente.asign');
Route::get('/getClientes', 'UserController@getClientes')->name('clientes.get');

//Rutas referentes a usuarios
Route::get('/listUsuarios', 'UserController@listUsuarios')->name('usuarios.list');
Route::get('/editUsuario/{id}','UserController@edit')->name('usuarios.editar');
Route::put('/update/{id}','UserController@update')->name('usuarios.update');
Route::delete('/deleteUsuario/{id}','UserController@delete')->name('usuarios.delete');
