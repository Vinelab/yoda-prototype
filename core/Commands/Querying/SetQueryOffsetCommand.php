<?php

namespace App\Core\Commands\Querying;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Set the skipping offset parameter to the given query.
 *
 * @category Command
 * @author Abed Halawi <abed.halawi@vinelab.com>
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
