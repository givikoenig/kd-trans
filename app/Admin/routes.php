<?php

use Illuminate\Routing\Router;

Admin::registerAuthRoutes();

Route::group([
    'prefix'        => config('admin.route.prefix'),
    'namespace'     => config('admin.route.namespace'),
    'middleware'    => config('admin.route.middleware'),
], function (Router $router) {

    $router->get('/', 'HomeController@index');
    $router->resource('site/slides', SliderController::class);
    $router->resource('site/articles', ArticleController::class);
    $router->resource('site/services', ServiceController::class);
    $router->resource('site/news', NewsController::class);
    $router->resource('site/menu', MenuController::class);
    $router->resource('site/about', AboutController::class);
    $router->resource('site/counters', CounterController::class);
    $router->resource('site/values', ValuesController::class);
    $router->resource('site/partners', PartnersController::class);
    $router->resource('site/messages', MessagesController::class);
    $router->resource('site/testimonials', TestimonialsController::class);
    $router->resource('site/subscribers', SubscribersController::class);
    $router->resource('site/orders', OrdersController::class);
    $router->resource('site/blockabout', BlockAboutController::class);
    $router->resource('site/blockabouticon', BlockAboutIconController::class);
});
