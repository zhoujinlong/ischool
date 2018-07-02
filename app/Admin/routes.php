<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');

    $router->resources([
        'simplepages' => SimplepagesController::class,
        'types' => TypesController::class,
        'levels' => LevelsController::class,
        'natures' => NaturesController::class,
        'categories' => CategoriesController::class,
        'newstypes' => NewstypesController::class,
        'advertisingSpaces' => AdvertisingSpacesController::class,
    ]);



});
