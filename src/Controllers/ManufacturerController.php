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
    private $per_page = 50;
    private $final_array = array();

    public function __construct(\Plenty\Modules\Item\Manufacturer\Contracts\ManufacturerRepositoryContract $item)
    {
        $this->item = $item;
    }

    public function getItems(Request $request, Response $response)
    {

        $item_list = $this->item->all([], 2, 1)->toArray();
        return $response->json($item_list);
        //return $response->json($this->GetPagedResult(1));
    }


    public function GetPagedResult($page){
        $item_list = $this->item->all([], $this->per_page, $page)->toArray();

        array_merge($this->final_array, $item_list);

        if(!$item_list["isLastPage"]){
            $this->GetPagedResult($page+1);
            //return $this->final_array;
        }else{
            return $this->final_array;
        }
    }
}
