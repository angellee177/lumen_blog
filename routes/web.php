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

$router->get('/', function () use($router){
    return $router->app->version();
});


$router->group(['prefix' => 'api/v1/posts', 'as'=>'post'], function($router)
{
    $router->post('/add', 'PostsController@create');
    $router->put('/update/{id}', 'PostsController@update');
    $router->delete('/delete/{id}', 'PostsController@delete');
    $router->get('/index', 'PostsController@index');
    $router->get('/show/{id}', 'PostsController@show');
});

