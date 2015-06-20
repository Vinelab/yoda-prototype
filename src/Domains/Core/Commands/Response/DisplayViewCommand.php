<?php

namespace Sample\Domains\Core\Commands\Response;

use Sample\Foundation\Command;
use Illuminate\Routing\ResponseFactory;

class DisplayViewCommand extends Command
{

   public function __construct($name, $data = [], $status = 200, $headers = [])
   {
       $this->name    = $name;
       $this->data    = $data;
       $this->status  = $status;
       $this->headers = $headers;
   }

    public function handle(ResponseFactory $response)
    {
        return $response->view($this->name, $this->data, $this->status, $this->headers);
    }
}
