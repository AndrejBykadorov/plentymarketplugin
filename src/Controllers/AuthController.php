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
use Plenty\Plugin\Application;


class AuthController extends Controller

{

    private $accountHelper;

    public function __construct(\Ecos\Helper\AccountHelper $accountHelper)
    {
        $this->accountHelper = $accountHelper;
    }

    //Get plentyid
    public function getPlentyId(Request $request, Response $response){
        return $response->json($this->accountHelper->getPlentyId());
    }

}


