<?php

namespace Sample\Domains\Core\Commands\Querying;

use Illuminate\Contracts\Bus\SelfHandling;
use Sample\Foundation\Command;

/**
 * Class ExecuteQueryCommand
 *
 * @category
 * @package Sample\Domains\Core\Commands\Querying
 * @author  Abed Halawi <abed.halawi@vinelab.com>
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class ExecuteQueryCommand extends Command implements SelfHandling
{

    public function __construct($data)
    {
        $this->query = $data;
    }

    public function handle()
    {
        return [
            'sql'      => $this->query->toSql(),
            'bindings' => $this->query->getBindings(),
        ];
    }
}
