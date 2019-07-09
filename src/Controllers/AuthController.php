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


private $settings;

    public function __construct(\Plenty\Modules\System\Contracts\WebstoreConfigurationRepositoryContract $settings)
    {
        $this->settings = $settings;
    }


    public function getAccessToken(Request $request, Response $response){


        $data = $this->settings->findByPlentyId(44475)->toArray();


        return $response->json($data);




    }
}


