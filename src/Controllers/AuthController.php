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

class AuthController extends Controller

{

    private $item;

    public function __construct(\Plenty\Modules\Item\Item\Contracts\ItemRepositoryContract $item)
    {
        $this->item = $item;
    }

    public function getAccessToken(Request $request, Response $response){
        $item_list = $this->item->search();
        return $response->json($item_list);
    }
}


