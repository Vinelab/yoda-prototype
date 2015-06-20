<?php

namespace Sample\Domains\Article\Commands;

use Sample\Foundation\Command;
use Sample\Domains\Article\Parts\Content;
use Illuminate\Contracts\Bus\SelfHandling;

class MakeNewContentCommand extends Command implements SelfHandling
{
    public function __construct($content = 'lots of command content is here')
    {
        $this->content = $content;
    }

    public function handle()
    {
        return new Content($this->content);
    }
}
