<?php

namespace Sample\Domains\Core\Commands\Querying;

use Sample\Foundation\Command;
use Illuminate\Contracts\Bus\SelfHandling;

class SetQueryLimit extends Command implements SelfHandling
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
