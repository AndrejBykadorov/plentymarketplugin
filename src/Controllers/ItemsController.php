<?php

namespace Ecos\Controllers;

/**
 * Created by PhpStorm.
 * User: andrejbykadorov
 * Date: 2019-07-08
 * Time: 13:07
 */

use Plenty\Plugin\Controller;
use Plenty\Plugin\Http\Request;
use Plenty\Plugin\Http\Response;
use Plenty\Plugin\Log\Loggable;

class ItemsController extends Controller

{
    public function __construct()
    {

    }

    public function getItems(Request $request, Response $response)
    {
        $itemRep = pluginApp(\Plenty\Modules\Item\Item\Contracts\ItemRepositoryContract::class);

        //$params = ["itemImages"];

        $item_list = $itemRep->search()->toArray();

        return $response->json($item_list);
    }
}


