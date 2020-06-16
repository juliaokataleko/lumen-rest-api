<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use App\Course;

$router->get('/', function () use ($router) {
    return "<h1 style='text-align: center; font-family: arial; margin-top: 3em'>Primeira API REST com Lumen</h1>";
});

$router->group(['prefix' => 'cursos'], function() use($router) {

    /**
     * Recurso: Curso
     * EndPoint: /cursos
     * Verbos: GET, POST, PUT/PATCH, DELETE
     */
    $router->get('/', 'CourseController@index');
    $router->get('/{course}', 'CourseController@show');
    $router->post('/', 'CourseController@store');
    $router->put('/{course}', 'CourseController@update');
    $router->delete('/{course}', 'CourseController@destroy');

});

