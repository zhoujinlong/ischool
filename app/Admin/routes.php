<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->get('simplepages', 'SimplepagesController@index');
    $router->get('simplepages/create', 'SimplepagesController@create');
    $router->post('simplepages', 'SimplepagesController@store');
    $router->get('simplepages/{id}/edit', 'SimplepagesController@edit');
    $router->put('simplepages/{id}', 'SimplepagesController@update');
    $router->delete('simplepages/{id}', 'SimplepagesController@destroy');

    $router->get('types', 'TypesController@index');
    $router->get('types/create', 'TypesController@create');
    $router->post('types', 'TypesController@store');
});
