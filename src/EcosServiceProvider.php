<?php
/**
 * Created by PhpStorm.
 * User: andrejbykadorov
 * Date: 2019-07-02
 * Time: 14:28
 */

namespace Ecos;

use Plenty\Plugin\ServiceProvider;
use Plenty\Modules\Cron\Services\CronContainer;
use Plenty\Log\Services\ReferenceContainer;
use Ecos\Crons\ItemExportCron;

class EcosServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     */

    public function register()
    {
        $this->getApplication()->register(EcosRouteServiceProvider::class);
    }

    public function boot(CronContainer $container)
    {
        //register crons
        $container->add(CronContainer::HOURLY, ItemExportCron::class);

    }

}
