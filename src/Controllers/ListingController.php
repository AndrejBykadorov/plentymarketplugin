<?php
/**
 * Created by PhpStorm.
 * User: andrejbykadorov
 * Date: 2019-07-19
 * Time: 14:23
 */

namespace Ecos\Controllers;


use Plenty\Plugin\Controller;
use Plenty\Plugin\Http\Request;
use Plenty\Plugin\Http\Response;
use Plenty\Plugin\Log\Loggable;

class ListingController extends Controller
{
    private $item;
    private $per_page = 50;
    private $final_array = array();

    public function __construct(\Plenty\Modules\Listing\Contracts\ListingRepositoryContract $item)
    {
        $this->item = $item;
    }

    public function getItems(Request $request, Response $response)
    {

        //return $response->json($this->GetPagedResult(1));
        return $response->json($this->item->search()->toArray());
    }


    public function GetPagedResult($page){


        //The relations to load in the ListingMarket instance. The relations available are 'type', 'stockDependenceType' and 'markets'.
        $params = ["type" => "type","stockDependenceType" =>"stockDependenceType","markets"=>"markets"];



        //public search(int $page = 1, int $itemsPerPage = 50, array $with = [], array $filters = []):PaginatedResult
        $item_list = $this->item->search($page, $this->per_page)->toArray();

        $this->final_array[$page] = $item_list;

        if(!$item_list["isLastPage"]){
            return $this->GetPagedResult($page+1);
        }else{
            return $this->final_array;
        }
    }
}
