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
    $router->get('types/{id}/edit', 'TypesController@edit');
    $router->put('types/{id}', 'TypesController@update');
    $router->delete('types/{id}', 'TypesController@destroy');

    $router->get('levels', 'LevelsController@index');
    $router->get('levels/create', 'LevelsController@create');
    $router->post('levels', 'LevelsController@store');
    $router->get('levels/{id}/edit', 'LevelsController@edit');
    $router->put('levels/{id}', 'LevelsController@update');
    $router->delete('levels/{id}', 'LevelsController@destroy');

    $router->get('natures', 'NaturesController@index');
    $router->get('natures/create', 'NaturesController@create');
    $router->post('natures', 'NaturesController@store');
    $router->get('natures/{id}/edit', 'NaturesController@edit');
    $router->put('natures/{id}', 'NaturesController@update');
    $router->delete('natures/{id}', 'NaturesController@destroy');

    $router->get('categories', 'CategoriesController@index');
    $router->get('categories/create', 'CategoriesController@create');
    $router->post('categories', 'CategoriesController@store');
    $router->get('categories/{id}/edit', 'CategoriesController@edit');
    $router->put('categories/{id}', 'CategoriesController@update');
    $router->delete('categories/{id}', 'CategoriesController@destroy');

    $router->get('newstypes', 'NewstypesController@index');
    $router->get('newstypes/create', 'NewstypesController@create');
    $router->post('newstypes', 'NewstypesController@store');
    $router->get('newstypes/{id}/edit', 'NewstypesController@edit');
    $router->put('newstypes/{id}', 'NewstypesController@update');
    $router->delete('newstypes/{id}', 'NewstypesController@destroy');

});
