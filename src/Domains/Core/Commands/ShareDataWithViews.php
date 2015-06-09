<?php

namespace Sample\Domains\Core\Commands;

use Illuminate\Routing\ResponseFactory;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Share the given data with all views.
 *
 * @category Command
 * @author Abed Halawi <abed.halawi@vinelab.com>
 */
class ShareDataWithViews extends Command implements SelfHandling
{
    public function __construct($data)
    {
        $this->data = $data;
    }

    public function handle(ResponseFactory $response)
    {
        foreach ($this->data as $key => $value)
        {
            $response->view()->share($key, $value);
        }
    }
}
