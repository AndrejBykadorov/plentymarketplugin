<?php
/**
 * Created by PhpStorm.
 * User: andrejbykadorov
 * Date: 2019-07-19
 * Time: 15:04
 */

namespace Ecos\Controllers;

use Plenty\Plugin\Controller;
use Plenty\Plugin\Http\Request;
use Plenty\Plugin\Http\Response;
use Plenty\Plugin\Log\Loggable;

class AttributeController extends Controller
{

    private $item;
    private $per_page = 50;
    private $final_array = array();

    public function __construct(Plenty\Modules\Item\Attribute\Contracts\AttributeMapRepositoryContract $item)
    {
        $this->item = $item;
    }

    public function getItems(Request $request, Response $response)
    {

        return $response->json($this->GetPagedResult(1));
    }


    public function GetPagedResult($page){
        $item_list = $this->item->all(null, $this->per_page, $page)->toArray();

        $this->final_array[$page] = $item_list;

        if(!$item_list["isLastPage"]){
            return $this->GetPagedResult($page+1);
        }else{
            return $this->final_array;
        }
    }
}
