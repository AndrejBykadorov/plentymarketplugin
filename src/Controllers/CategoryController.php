<?php
/**
 * Created by PhpStorm.
 * User: andrejbykadorov
 * Date: 2019-07-19
 * Time: 13:44
 */

namespace Ecos\Controllers;

use Plenty\Plugin\Controller;
use Plenty\Plugin\Http\Request;
use Plenty\Plugin\Http\Response;
use Plenty\Plugin\Log\Loggable;

class CategoryController extends Controller
{
    private $item;

    public function __construct(\Plenty\Modules\Category\Contracts\CategoryRepositoryContract $item)
    {
        $this->item = $item;
    }

    public function getItems(Request $request, Response $response)
    {
        return $response->json($this->item->getArrayTree("all", "de", null, 6, 0, null));
    }
}
