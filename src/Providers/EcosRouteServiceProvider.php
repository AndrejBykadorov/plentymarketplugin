<?php
namespace Ecos;
use Plenty\Plugin\RouteServiceProvider;
use Plenty\Plugin\Routing\ApiRouter;
use Plenty\Plugin\Routing\Router as WebRouter;

/**
 * Class EtsyRouteServiceProvider
 */
class EtsyRouteServiceProvider extends RouteServiceProvider
{
    /**
     * @param ApiRouter $api
     * @param WebRouter $webRouter
     */
    public function map(ApiRouter $api, WebRouter $webRouter)
    {
        $webRouter->get('markets/ecos/auth/access-token', ['uses' => 'Ecos\Controllers\AuthController@getAccessToken']);
    }
}
