<?php

namespace Sample\Domains\Article\Commands;

use Sample\Foundation\Command;

class GetCreateArticleViewNameCommand extends Command
{
    public function handle()
    {
        return 'Cms::article.create';
    }
}
