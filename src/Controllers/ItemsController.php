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

    public function __construct(\Plenty\Modules\Item\DataLayer\Contracts\ItemDataLayerRepositoryContract $item)
    {
        $this->item = $item;
    }

    public function getItems(Request $request, Response $response)
    {

        $params = ["itemImages"];

        $item_list = $this->item->search($this->resultFields(), [], $params)->toArray();

        return $response->json($item_list);
    }


    private function resultFields()
    {
        $resultFields = [
            'itemBase' => [
                'id',
                'producer',
            ],
            'itemShippingProfilesList' => [
                'id',
                'name',
            ],
            'itemDescription' => [
                'params' => $this->getItemDescriptionParams(),
                'fields' => [
                    'name1',
                    'description',
                    'shortDescription',
                    'technicalData',
                    'keywords',
                    'lang',
                ],
            ],
            'variationMarketStatus' => [
                'params' => [
                    'marketId' => ""
                ],
                'fields' => [
                    'id',
                    'sku',
                    'marketStatus',
                    'additionalInformation',
                ]
            ],
            'variationBase' => [
                'id',
                'limitOrderByStockSelect',
                'weightG',
                'lengthMm',
                'widthMm',
                'heightMm',
                'attributeValueSetId',
            ],
            'variationRetailPrice' => [
                'price',
                'currency',
            ],
            'variationStock' => [
                'params' => [
                    'type' => 'virtual'
                ],
                'fields' => [
                    'stockNet'
                ]
            ],
            'variationStandardCategory' => [
                'params' => [
                    'plentyId' => '44475',
                ],
                'fields' => [
                    'categoryId'
                ],
            ],
            'itemCharacterList' => [
                'itemCharacterId',
                'characterId',
                'characterValue',
                'characterValueType',
                'isOrderCharacter',
                'characterOrderMarkup'
            ],
            'variationAttributeValueList' => [
                'attributeId',
                'attributeValueId'
            ],
            'variationImageList' => [
                'params' => [
                    'all_images'                                       => [
                        'type'                 => 'all', // all images
                        'fileType'             => ['gif', 'jpeg', 'jpg', 'png'],
                        'imageType'            => ['internal'],

                    ],
                    'only_current_variation_images_and_generic_images' => [
                        'type'                 => 'item_variation', // current variation + item images
                        'fileType'             => ['gif', 'jpeg', 'jpg', 'png'],
                        'imageType'            => ['internal'],

                    ],
                    'only_current_variation_images'                    => [
                        'type'                 => 'variation', // current variation images
                        'fileType'             => ['gif', 'jpeg', 'jpg', 'png'],
                        'imageType'            => ['internal'],

                    ],
                    'only_generic_images'                              => [
                        'type'                 => 'item', // only item images
                        'fileType'             => ['gif', 'jpeg', 'jpg', 'png'],
                        'imageType'            => ['internal'],

                    ],
                ],
                'fields' => [
                    'imageId',
                    'type',
                    'fileType',
                    'path',
                    'position',
                    'attributeValueId',
                ],
            ],
        ];
        return $resultFields;
    }

    private function getItemDescriptionParams()
    {

            $list[ "de" ] = [
                'language' => "de",
            ];

        return $list;
    }
}


