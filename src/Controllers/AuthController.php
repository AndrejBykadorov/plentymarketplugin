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
use Plenty\Modules\Item\ItemImage\Contracts;

class AuthController extends Controller

{

    private $item;
    private $imageRepository;

    public function __construct(\Plenty\Modules\Item\Item\Contracts\ItemRepositoryContract $item, \Plenty\Modules\Item\ItemImage\Contracts\ItemImageRepositoryContract $imageRepository)
    {
        $this->item = $item;
        $this->imageRepository = $imageRepository;
    }

    public function getAccessToken(Request $request, Response $response){

        //$item_list = $this->item->search()->toArray();

        $items_final = array();

        $itemRep =  pluginApp(\Plenty\Modules\Item\Item\Contracts\ItemRepositoryContract::class);

        $params = [
            'with'  => [
                'images' => null,
                // 'ItemImages' => null,
                // 'itemImages' => null,
                'variationImages' => null,
                'variationImageList' => null,
                'item' => null,
                'itemTexts' => null,
                'variationSalesPrices' => null,
            ],
        ];


        $item_list = $itemRep->search(null, null, 1, 50, $params)->toArray();

        foreach ($item_list["entries"] as $key => $item_array){


            if($item_array["id"] == 133){

                //$images = $this->imageRepository->findByItemId($item_array["id"]);
                //$img = $this->imageRepository->findByVariationId($item_array["variationBase"]["id"]);

                $items_final[$key] = array(
                    "id" => $item_array["id"],
                    "manufacturerID" => $item_array["manufacturerId"],
                    "name" => $item_array["texts"][0]["name1"]
                    //"images" => $images
                );
            }

        }
        return $response->json($item_list);
    }
}


