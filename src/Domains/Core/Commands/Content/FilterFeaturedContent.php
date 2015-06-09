<?php

namespace Sample\Domains\Core\Commands\Content;

use Sample\Foundation\Command;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Add featured content specific query when found.
 *
 * @category Command
 * @author Abed Halawi <abed.halawi@vinelab.com>
 */
class FilterFeaturedContent extends Command implements SelfHandling
{
    public function __construct($data, $is_featured = false)
    {
        $this->query = $data;
        $this->isFeatured = (bool) $is_featured;
    }

    public function handle()
    {
        if ($this->isFeatured) {
            $this->query->featured();
        }

        return $this->query;
    }
}
