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
        // the data that will be passed from a command to another in a bus behavior.
        $values = [];
        $builder = $this->newBuilderInstance();
        foreach ($this->getCommands() as $part => $command) {
            if(!$part) {
                // we reach here when we have a command alone, which is where we should
                // extract the parts out of the builder and pass them as 'extras'.
                $extras = array_merge($builder->toArray(), ['builderInstance' => $builder]);
                $values = $dispatcher->dispatchFrom($command, $request, $extras);
            } else if(class_exists($part)) {
                // when the $part is the command itself, we assume that the dev means
                // to switch b/w part and command and invoke the command passing the $values
                // as argument(s) with the argument being as described: i.e. '$command => $argument'.
                $argument = $command;
                $command = $part;
                $values = $dispatcher->dispatchFrom($command, $request, [$argument => $values]);
            } else {
                list($command, $extras) = $this->getExtras($command, $request);
                // we've received the 'make' signal
                $builder->$part = $dispatcher->dispatchFrom($command, $request, $extras);
            }
        }

        return $values;
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

    /**
     * Set the hasBeenBuilt attribute.
     *
     * @param boolean $built
     */
    protected function setHasBeenBuilt($built)
    {
        $this->hasBeenBuilt = $built;
    }

    protected function newBuilderInstance()
    {
        return new $this->builder;
    }
}
