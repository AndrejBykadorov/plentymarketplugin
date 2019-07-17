<?php
namespace Ecos\Crons;
use Plenty\Modules\Cron\Contracts\CronHandler as Cron;
//use Etsy\Services\Batch\Item\ItemExportService;
use Ecos\Helper\AccountHelper;
use Plenty\Plugin\Log\Loggable;
/**
 * Class ItemExportCron
 */
class ItemExportCron extends Cron
{
    use Loggable;

    public function __construct()
    {

    }
    /**
     * Run the item export process.
     *
     * @param ItemExportService $service
     * @param AccountHelper     $accountHelper
     */
    public function handle(ItemExportService $service)
    {
        try
        {
                $service->run();
        }
        catch(\Exception $ex)
        {
            $this->getLogger(__FUNCTION__)->error('Ecos::item.itemExportError', $ex->getMessage());
        }
    }

}
