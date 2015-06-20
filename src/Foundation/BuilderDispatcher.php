<?php

namespace Sample\Foundation;

use Illuminate\Http\Request;
use Illuminate\Contracts\Bus\Dispatcher as IlluminateDispatcher;

/**
 * Dispatches given instances passing required arguments.
 *
 * @category Invoker
 *
 * @author Abed Halawi <abed.halawi@vinelab.com>
 */
class BuilderDispatcher extends Dispatcher
{
    /**
     * Indicates whether the last builder has been built or not
     *
     * @var boolean
     */
    private $hasBeenBuilt = false;

    protected $builder = Builder::class;

    public function handle(Request $request, IlluminateDispatcher $dispatcher)
    {
        // the data that willbe passed from a command to another in a default behavior.
        $data = [];
        $builder = $this->newBuilderInstance();
        foreach ($this->getCommands() as $part => $command) {
            // when the builder has done its job, fallback
            // to the default dispatcher behavior.
            if ($this->hasBeenBuilt)
            {
                // switch the order
                $expected = $command;
                $command = $part;
                $values = $dispatcher->dispatchFrom($command, $request, [$expected => $values]);
            } else {
                list($command, $extras) = $this->getExtras($command, $request);
                // we've received the 'make' signal
                if (!$part && $command === 'make') {
                    $this->setHasBeenBuilt(true);
                    $values = $builder->make();
                } else {
                    $builder->$part = $dispatcher->dispatchFrom($command, $request, $extras);
                }
            }
        }
    }

    protected function getExtras($command, Request $request)
    {
        // when the command is an array it means we need to replace
        // the input with their corresponding replacement placeholders
        // i.e. if the MakeNewPhotoCommand expects the input to be 'photo'
        //      and the input from a form is 'cover' we will need to replace
        //      'cover' with 'photo' as "extras" for the command.
        $extras = [];
        if (is_array($command)) {
            list($command, $map) = $command;
            foreach ($map as $expected => $real) {
                $extras = [$expected => $request->input($real)];
            }
        }

        return [$command, $extras];
    }

    protected function setHasBeenBuilt($built)
    {
        $this->hasBeenBuilt = $built;
    }

    protected function newBuilderInstance()
    {
        return new $this->builder;
    }
}
