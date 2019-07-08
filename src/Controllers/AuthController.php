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

    public function __construct(\Plenty\Modules\Authorization\Contracts\AuthorizedUserRepositoryContract $contract)
    {
        $this->contract = $contract;
    }

    public function getAccessToken(Request $request, Response $response){
        try {


            //$contactRepository = pluginApp(ContactRepositoryContract::class);
            $user = $this->contract->getCurrentAuthorizedUser();
            return json_encode($user);

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
}


