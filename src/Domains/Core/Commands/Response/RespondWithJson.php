<?php

namespace Sample\Domains\Core\Commands\Response;

use Sample\Foundation\Command;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Contracts\Bus\SelfHandling;

class RespondWithJson extends Command implements SelfHandling
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
