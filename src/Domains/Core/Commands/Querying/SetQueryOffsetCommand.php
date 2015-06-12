<?php

namespace Sample\Domains\Core\Commands\Querying;

use Illuminate\Contracts\Bus\SelfHandling;
use Sample\Foundation\Command;

/**
 * Set the skipping offset parameter to the given query.
 *
 * @category Command
 * @author   Abed Halawi <abed.halawi@vinelab.com>
 * @author   Mahmoud Zalt <mahmoud@vinelab.com>
 */
class SetQueryOffsetCommand extends Command implements SelfHandling
{

    public function __construct($data, $offset = 0)
    {
        $this->query = $data;
        $this->offset = $offset;
    }

    public function handle()
    {
        return $this->query->skip($this->offset);
    }
}
