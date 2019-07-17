<?php
/**
 * Created by PhpStorm.
 * User: andrejbykadorov
 * Date: 2019-07-17
 * Time: 15:36
 */

namespace Ecos\Service;

class ItemExportService
{

    private $api;

    public function __construct(\Ecos\Api\Client $api)
    {

        $this->api = $api;
    }

    public function run(){

        $itemRep = pluginApp(\Plenty\Modules\Item\Item\Contracts\ItemRepositoryContract::class);

        $item_list = $itemRep->search()->toArray();



    }
}
