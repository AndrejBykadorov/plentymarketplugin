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
    private $item_image;

    public function __construct(\Plenty\Modules\Item\Item\Contracts\ItemRepositoryContract $item, \Plenty\Modules\Item\ItemImage\Contracts\ItemImageRepositoryContract $item_image)
    {
        $this->item = $item;
        $this->item_image = $item_image;
    }

    public function getAccessToken(Request $request, Response $response){

        $item_list = $this->item->search()->toArray();

        $items_final = array();

        foreach ($item_list["entries"] as $key => $item_array){

            $images = $this->item_image->findByItemId($item_array["id"]);

                $items_final[$key] = array(
                    "id" => $item_array["id"],
                    "manufacturerId" => $item_array["manufacturerId"],
                    "images" => $images
                );
        }
        return $response->json($item_list);
    }
}


