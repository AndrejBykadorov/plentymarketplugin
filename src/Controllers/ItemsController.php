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

    private $item;

    public function __construct(\Plenty\Modules\Item\Item\Contracts\ItemRepositoryContract $item)
    {
        $this->item = $item;
    }

    public function getItems(Request $request, Response $response)
    {

        $params = ["itemImages"];

        $item_list = $this->item->search(array(null),"DE",1,50, $params)->toArray();

        return $response->json($item_list);
    }
}


