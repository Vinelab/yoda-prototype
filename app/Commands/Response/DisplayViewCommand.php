<?php

namespace App\Commands\Response;

use App\Commands\Command;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Display view by name and pass data to it.
 *
 * @category Command
 * @author Abed Halawi <abed.halawi@vinelab.com>
 */
class DisplayViewCommand extends Command implements SelfHandling
{
    public function __construct($name, $data = [], $status = 200, $headers = [])
    {
        $this->name = $name;
        $this->data = $data;
        $this->status = $status;
        $this->headers = $headers;
    }

    public function handle(ResponseFactory $response)
    {
        return $response->view($this->name, $this->data, $this->status, $this->headers);
    }
}
