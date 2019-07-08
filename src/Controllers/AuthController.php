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
use Plenty\Modules\Authorization\Contracts;


class AuthController extends Controller

{

    private $contract;

    public function __construct(Plenty\Modules\Item\Manufacturer\Contracts\ManufacturerRepositoryContract $contract)
    {
        $this->contract = $contract;
    }

    public function getAccessToken(Request $request, Response $response){
        return $response->json($this->contract->all()->toArray());
    }
}


