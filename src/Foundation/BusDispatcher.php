<?php

namespace Sample\Foundation;

use Illuminate\Contracts\Bus\Dispatcher as IlluminateDispatcher;

class BusDispatcher extends Dispatcher
{
    public function handle(Request $request, IlluminateDispatcher $dispatcher)
    {
        foreach ($this->getCommands() as $command => $expected) {
            $result = $this->dispatchFrom($command, $request, [$expected => $result]);
        }

        return $result;
    }
}
