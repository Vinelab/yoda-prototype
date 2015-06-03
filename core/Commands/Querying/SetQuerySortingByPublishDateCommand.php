<?php

namespace App\Core\Commands\Querying;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;

class SetQuerySortingByPublishDateCommand extends Command implements SelfHandling
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
