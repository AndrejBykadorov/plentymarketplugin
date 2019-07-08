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


    public function getAccessToken(Request $request, Response $response, AuthorizedUserRepositoryContract $contract){
        try {
            //$contactRepository = pluginApp(ContactRepositoryContract::class);

            $user = $contract->getCurrentAuthorizedUser();

            return json_encode($user);

        } catch (\Exception $e) {
            throw new \Exception($e->getMessage(), $e->getCode());
        }
    }
}


