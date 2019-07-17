<?php
/**
 * Created by PhpStorm.
 * User: andrejbykadorov
 * Date: 2019-07-17
 * Time: 14:34
 */

namespace Ecos\Api;

use Ecos\Helper\AccountHelper;

class Client
{
    /**
     * @var AccountHelper
     */
    private $accountHelper;

    /**
     * @param AccountHelper       $accountHelper
     */
    public function __construct(AccountHelper $accountHelper)
    {
        $this->accountHelper = $accountHelper;
    }


    public function call($method, $data){

        $url = $this->accountHelper->getApiURL();

        $curl = curl_init();

        switch ($method)
        {
            case "POST":
                curl_setopt($curl, CURLOPT_POST, 1);

                if ($data)
                    curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
                break;
            case "PUT":
                curl_setopt($curl, CURLOPT_PUT, 1);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }


        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl);
        curl_close($curl);
        return $result;
    }



}
