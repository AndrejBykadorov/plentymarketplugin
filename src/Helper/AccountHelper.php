<?php
/**
 * Created by PhpStorm.
 * User: andrejbykadorov
 * Date: 2019-07-17
 * Time: 14:27
 */

namespace Ecos\Helper;
use Plenty\Plugin\Application;

class AccountHelper
{

    /**
     * @var Application
     */
    private $app;


    public function __construct(Application $app)
    {
        $this->app = $app;
    }

    public function getPlentyId(){
        return $this->app->getPlentyId();
    }

    private function getApiSecret(){
        return md5("165fgdf54sd6f54f6sd48fds6f48sd6f84dsf68sd4f6s84fsd6".$this->getPlentyId());
    }

    public function getApiURL(){
        return sprintf("https://ecos-integration-api.azurewebsites.net/v1/plentyMarket/SyncItems?plentyid=%s&secretkey=%s", $this->getPlentyId(), $this->getApiSecret());
    }

}
