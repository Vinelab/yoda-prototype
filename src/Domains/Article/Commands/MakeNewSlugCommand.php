<?php

namespace Sample\Domains\Article\Commands;

use Sample\Foundation\Command;
use Sample\Domains\Article\Parts\Slug;
use Illuminate\Contracts\Bus\SelfHandling;

class MakeNewSlugCommand extends Command implements SelfHandling
{
    public function __construct($title)
    {
        $this->slug = $title;
    }

    public function handle()
    {
        return new Slug($this->slug);
    }
}
