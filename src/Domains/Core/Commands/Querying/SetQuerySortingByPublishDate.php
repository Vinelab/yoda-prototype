<?php

namespace Sample\Domains\Core\Commands\Querying;

use Sample\Foundation\Command;
use Illuminate\Contracts\Bus\SelfHandling;

class SetQuerySortingByPublishDate extends Command implements SelfHandling
{
    public function __construct($data, $sorting_direction = 'desc')
    {
        $this->query = $data;
        $this->direction = $sorting_direction;
    }

    public function handle()
    {
        return $this->query->orderBy('publish_date', $this->direction);
    }
}
