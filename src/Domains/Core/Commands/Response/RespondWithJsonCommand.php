<?php

namespace Sample\Domains\Core\Commands\Response;

use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Routing\ResponseFactory;
use Sample\Foundation\Command;

/**
 * Class RespondWithJsonCommand
 *
 * @category
 * @package Sample\Domains\Core\Commands\Response
 * @author  Abed Halawi <abed.halawi@vinelab.com>
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class RespondWithJsonCommand extends Command implements SelfHandling
{

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function handle(ResponseFactory $response)
    {
        return $response->json($this->data);
    }
}
