<?php

namespace Sample\Domains\Article\Commands;

use Sample\Foundation\Command;
use Sample\Domains\Article\Parts\Title;
use Illuminate\Contracts\Bus\SelfHandling;

class MakeNewTitleCommand extends Command
{
    public function __construct($title = 'command title here')
    {
        $this->title = $title;
    }

    public function handle()
    {
        return new Title($this->title);
    }
}
