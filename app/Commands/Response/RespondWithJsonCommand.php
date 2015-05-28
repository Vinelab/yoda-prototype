<?php

namespace App\Commands\Response;

use App\Commands\Command;
use Illuminate\Routing\ResponseFactory;
use Illuminate\Contracts\Bus\SelfHandling;

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
