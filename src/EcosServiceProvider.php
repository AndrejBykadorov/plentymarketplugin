<?php
/**
 * Created by PhpStorm.
 * User: andrejbykadorov
 * Date: 2019-07-02
 * Time: 14:28
 */

namespace Ecos;

use Plenty\Plugin\ServiceProvider;

class EcosServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     */

    public function register()
    {
        $this->getApplication()->register(EcosRouteServiceProvider::class);
    }
}
