<?php
/**
 * Created by PhpStorm.
 * User: andrejbykadorov
 * Date: 2019-07-19
 * Time: 10:11
 */

namespace Ecos\Controllers;

use Plenty\Plugin\Controller;
use Plenty\Plugin\Http\Request;
use Plenty\Plugin\Http\Response;
use Plenty\Plugin\Log\Loggable;

class ManufacturerController extends Controller
{
    private $item;

    public function __construct(\Plenty\Modules\Item\Manufacturer\Contracts $item)
    {
        $this->item = $item;
    }

    public function getItems(Request $request, Response $response)
    {

        $item_list = $this->item->all([],300,1)->toArray();

        return $response->json($item_list);
    }
}
