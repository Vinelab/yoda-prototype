<?php

namespace App\Core\Commands\Querying;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;

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
