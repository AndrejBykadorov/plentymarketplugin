<?php

namespace Ecos\Providers;


use Plenty\Plugin\RouteServiceProvider;
use Plenty\Plugin\Routing\Router;

class EcosRouteServiceProvider extends RouteServiceProvider
{
    public function map(Router $router)
    {
        $router->get('hello','Ecos\Controllers\ContentController@sayHello');
    }
}
