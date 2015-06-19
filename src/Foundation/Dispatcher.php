<?php

namespace Sample\Foundation;

use Illuminate\Http\Request;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Contracts\Bus\Dispatcher as IlluminateDispatcher;

/**
 * Dispatches given instances passing required arguments.
 *
 * @category Invoker
 *
 * @author Mahmoud Zalt <mahmoud@vinelab.com>
 * @author Abed Halawi <abed.halawi@vinelab.com>
 */
class Dispatcher implements SelfHandling
{
    /**
     * Holds the dispatchable commands in sequential order
     *
     * @var array
     */
    protected $commands = [];

    /**
     * Get the commands of this instance.
     *
     * @return array
     */
    public function getCommands()
    {
        return $this->commands;
    }
}
