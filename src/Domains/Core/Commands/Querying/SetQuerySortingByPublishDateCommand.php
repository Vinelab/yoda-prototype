<?php

namespace Sample\Domains\Core\Commands\Querying;

use Illuminate\Contracts\Bus\SelfHandling;
use Sample\Foundation\Command;

/**
 * Class SetQuerySortingByPublishDateCommand
 *
 * @category
 * @package Sample\Domains\Core\Commands\Querying
 * @author  Abed Halawi <abed.halawi@vinelab.com>
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class SetQuerySortingByPublishDateCommand extends Command implements SelfHandling
{

    public function __construct($data, $sorting_direction = 'desc')
    {
        $this->query = $data;
        $this->direction = $sorting_direction;
    }

    public function handle()
    {
        return $this->query->orderBy('publish_date', $this->direction);
    }
}
