<?php

namespace App\Commands\Content;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Add featured content specific query when found.
 *
 * @category Command
 * @author Abed Halawi <abed.halawi@vinelab.com>
 */
class QueryFeaturedContentCommand extends Command implements SelfHandling
{
    public function __construct($data, $featured = false)
    {
        $this->query = $data;
        $this->featured = (bool) $featured;
    }

    public function handle()
    {
        if ($this->featured) {
            $this->query->featured = true;
        }

        return $this->query;
    }
}
