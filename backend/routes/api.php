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

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/

//Grupo de rutas que tienen un middleware jwt.auth
Route::group(['middleware' => ['jwt.auth']], function () {
    
    Route::resource('clientes', 'ClienteController');
    Route::post('historialcliente', 'ClienteController@obtenerHistorialCliente');
    Route::resource('gimnasio', 'GimnasioController');
    Route::resource('historial', 'HistorialController');
    Route::resource('estadorutina', 'EstadoRutinaController');
    Route::resource('rol', 'RolController');
    Route::resource('rutina', 'RutinaController');
    Route::resource('usuario', 'UserController');

});
//Nueva ruta para el login
Route::post('/login', 'AuthenticateController@authenticate');
Route::post('token', 'AuthenticateController@getAuthenticatedUser');