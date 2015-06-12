<?php

namespace Sample\Domains\Core\Commands\Querying;

use Illuminate\Contracts\Bus\SelfHandling;
use Sample\Foundation\Command;

/**
 * Class SetQueryLimitCommand
 *
 * @category
 * @package Sample\Domains\Core\Commands\Querying
 * @author  Abed Halawi <abed.halawi@vinelab.com>
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class SetQueryLimitCommand extends Command implements SelfHandling
{

    public function __construct($data, $limit = 0)
    {
        $this->query = $data;
        $this->limit = $limit;
    }

    public function handle()
    {
        if ($this->limit <= 0) {
            $this->limit = 10;
        }

        return $this->query->take($this->limit);
    }
}
