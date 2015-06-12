<?php

namespace Sample\Domains\Core\Commands\Querying;

use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Bus\DispatchesCommands;
use Sample\Foundation\Command;

/**
 * Set the pagination parameters on the given query.
 *
 * @category Command
 * @author   Abed Halawi <abed.halawi@vinelab.com>
 * @author   Mahmoud Zalt <mahmoud@vinelab.com>
 */
class SetQueryPaginationCommand extends Command implements SelfHandling
{

    use DispatchesCommands;

    public function __construct($data, $limit = 0, $offset = 0)
    {
        $this->query = $data;
        $this->limit = $limit;
        $this->offset = $offset;
    }

    public function handle()
    {
        $this->query = $this->dispatchFromArray(
            'App\Core\Commands\Querying\SetQueryLimitCommand',
            ['data' => $this->query, 'limit' => $this->limit]
        );

        $this->query = $this->dispatchFromArray(
            'App\Core\Commands\Querying\SetQueryOffsetCommand',
            ['data' => $this->query, 'offset' => $this->offset]
        );

        return $this->query;
    }
}
