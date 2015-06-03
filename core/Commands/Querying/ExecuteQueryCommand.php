<?php

namespace App\Core\Commands\Querying;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;

class ExecuteQueryCommand extends Command implements SelfHandling
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
