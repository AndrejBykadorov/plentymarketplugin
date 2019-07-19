<?php
namespace Ecos;
use Plenty\Plugin\RouteServiceProvider;
use Plenty\Plugin\Routing\ApiRouter;
use Plenty\Plugin\Routing\Router as WebRouter;

/**
 * Class EtsyRouteServiceProvider
 */
class EcosRouteServiceProvider extends RouteServiceProvider
{
    /**
     * @param ApiRouter $api
     * @param WebRouter $webRouter
     */
    public function map(ApiRouter $api, WebRouter $webRouter)
    {
        $webRouter->get('markets/ecos/auth/plentyid', ['uses' => 'Ecos\Controllers\AuthController@getPlentyId']);
        $webRouter->get('markets/ecos/data/getitems', ['uses' => 'Ecos\Controllers\ItemsController@getItems']);
        $webRouter->get('markets/ecos/data/getmanufacturer', ['uses' => 'Ecos\Controllers\ManufacturerController@getItems']);
    }
}
