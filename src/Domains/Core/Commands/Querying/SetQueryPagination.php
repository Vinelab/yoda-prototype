<?php

namespace Sample\Domains\Core\Commands\Querying;

use Sample\Foundation\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Bus\DispatchesCommands;

/**
 * Set the pagination parameters on the given query.
 *
 * @category Command
 * @author Abed Halawi <abed.halawi@vinelab.com>
 */
class SetQueryPagination extends Command implements SelfHandling
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
