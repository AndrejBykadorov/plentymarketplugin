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
use Plenty\Modules\Plugin\DynamoDb\Contracts\DynamoDbRepositoryContract;



class AuthController extends Controller


{

    const PLUGIN_NAME = 'Etsy';
    const TABLE_NAME = 'settings';
    const SETTINGS_TOKEN_REQUEST = 'token_request';
    const SETTINGS_ACCESS_TOKEN = 'access_token';
    const SETTINGS_SETTINGS = 'settings';
    const SETTINGS_ETSY_SHOPS = 'etsy_shops';
    const SETTINGS_ORDER_REFERRER = 'order_referrer';
    const SETTINGS_LAST_ORDER_IMPORT = "last_order_import";
    const SETTINGS_LAST_ITEM_EXPORT = "last_item_export";
    const SETTINGS_LAST_STOCK_UPDATE = "last_stock_update";
    const SETTINGS_PROCESS_ITEM_EXPORT = 'item_export';
    const SETTINGS_PROCESS_STOCK_UPDATE = 'stock_update';
    const SETTINGS_PROCESS_ORDER_IMPORT = 'order_import';

    private $dynamoDbRepo;
    private $item;
    private $imageRepository;
    private $cred;


    public function __construct(DynamoDbRepositoryContract $dynamoDbRepository)
    {
        $this->dynamoDbRepo = $dynamoDbRepository;
    }

    public function get($name, $default = null)
    {
        $data = $this->dynamoDbRepo->getItem("Etsy", self::TABLE_NAME, true, [
            'name' => [\Plenty\Modules\Plugin\DynamoDb\Contracts\DynamoDbRepositoryContract::FIELD_TYPE_STRING => $name]
        ]);
        if(isset($data['value'][ \Plenty\Modules\Plugin\DynamoDb\Contracts\DynamoDbRepositoryContract::FIELD_TYPE_STRING ]))
        {
            return $data['value'][ \Plenty\Modules\Plugin\DynamoDb\Contracts\DynamoDbRepositoryContract::FIELD_TYPE_STRING ];
        }
        return $default;
    }



    public function getAccessToken(Request $request, Response $response){


        //$this->cred->all();


        //$cred =  pluginApp(\Plenty\Modules\Market\Credentials\Contracts\CredentialsRepositoryContract::class);




        $data = $this->get(self::SETTINGS_ACCESS_TOKEN);


        //$tokenData = $this->accountHelper->getTokenData();


        return $response->json($data);




    }
}


