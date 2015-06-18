<?php

namespace Sample\Domains\Core\Commands\Response;

use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Routing\ResponseFactory;
use Sample\Foundation\Command;

/**
 * Display view by name and pass data to it.
 *
 * @category Command
 * @author   Abed Halawi <abed.halawi@vinelab.com>
 * @author   Mahmoud Zalt <mahmoud@vinelab.com>
 */
class DisplayViewCommand extends Command implements SelfHandling
{

//    public function __construct($name, $data = [], $status = 200, $headers = [])
//    {
//        $this->name = $name;
//        $this->data = $data;
//        $this->status = $status;
//        $this->headers = $headers;
//    }

    public function handle(ResponseFactory $response)
    {
        $this->setResponse($response->view('Cms::article.create'));
    }
}
