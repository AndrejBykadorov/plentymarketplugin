<?php

namespace Ecos\Controllers;

/**
 * Created by PhpStorm.
 * User: andrejbykadorov
 * Date: 2019-07-08
 * Time: 13:07
 */

use Plenty\Modules\Plugin\DynamoDb\Contracts\DynamoDbRepositoryContract;
use Plenty\Plugin\Controller;
use Plenty\Plugin\Http\Request;
use Plenty\Plugin\Http\Response;
use Plenty\Plugin\Log\Loggable;
use Plenty\Modules\Authorization\Contracts;


class AuthController extends Controller
{
    public function getAccessToken(Request $request){
        try {

            //$user = $this->contracts->getCurrentAuthorizedUser();
            return json_encode($request);
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
}


