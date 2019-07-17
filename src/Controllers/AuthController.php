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

    private $accountHelper;

    public function __construct(\Ecos\Helper\AccountHelper $accountHelper)
    {
        $this->accountHelper = $accountHelper;
    }

    //Get plentyid
    public function getPlentyId(Request $request, Response $response){

        $result = array();

        $result["plentyid"] = $this->accountHelper->getPlentyId();
        $result["secretkey"] = $this->accountHelper->getApiSecret();

        return $response->json($result);
    }

}


