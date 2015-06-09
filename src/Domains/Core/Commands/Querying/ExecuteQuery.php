<?php

namespace Sample\Domains\Core\Commands\Querying;

use Sample\Foundation\Command;
use Illuminate\Contracts\Bus\SelfHandling;

class ExecuteQuery extends Command implements SelfHandling
{
    public function __construct($data)
    {
        $this->query = $data;
    }

    public function handle()
    {
        return [
            'sql' => $this->query->toSql(),
            'bindings' => $this->query->getBindings(),
        ];
    }
}
