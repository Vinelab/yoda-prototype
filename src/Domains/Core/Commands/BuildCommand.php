<?php

namespace Sample\Domains\Core\Commands;

use Sample\Foundation\Command;
use Sample\Foundation\BuilderInterface;

class BuildCommand extends Command
{
    public function __construct(BuilderInterface $builderInstance)
    {
        $this->builder = $builderInstance;
    }

    public function handle()
    {
        return $this->builder->make();
    }
}
