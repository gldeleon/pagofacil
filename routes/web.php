<?php

/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | Here is where you can register all of the routes for an application.
  | It is a breeze. Simply tell Lumen the URIs it should respond to
  | and give it the Closure to call when that URI is requested.
 *
 * LAS RUTAS LLEVARAN LA SIGUIENTE FORMA
 * https://dominio/MODULO/METODO?QUERY-STRING-CON-LOS-PARAMETROS
  |
 */

/**
 * Inicio del API
 * @return view
 * @param none
 */
$router->get('/', function () use ($router) {
    //return $router->app->version();
    return view('welcomeView');
});

/**
 * Grupo para Auth con apitoken, sin el no tendran acceso a los datos
 * @return datos solicitados
 * @param string $apitoken con el apitoken asignado
 */
$router->group(['middleware' => 'auth'], function () use ($router) {
    $router->get('/alumnos', 'AlumnosController@index');
    $router->get('/alumnos/{id}', 'AlumnosController@getAlumnos');
    $router->post('/calificaciones/{id_al}/{id_materia}/{calificacion}', 'CalificacionesController@AddCalificacion');
    $router->put('/calificaciones/{id_al}/{id_materia}/{calificacion}', 'CalificacionesController@UpdateCalificacion');
    $router->delete('/calificaciones/{id_al}/{id_materia}', 'CalificacionesController@DeleteCalificacion');
});
