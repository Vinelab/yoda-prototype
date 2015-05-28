<?php

namespace App\Operations;

use Illuminate\Http\Request;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Foundation\Bus\DispatchesCommands;

class Operation implements SelfHandling
{
    use DispatchesCommands;

    /**
     * The model involved in this operation
     *
     * @var string
     */
    protected $model = '';

    /**
     * The commands to dispatch in sequential order
     *
     * @var array
     */
    protected $commands = [];

    /**
     * The current request instance.
     *
     * @var \Illuminate\Http\Request
     */
    protected $request;

    /**
     * Constructor
     *
     * @param \Illuminate\Http\Request $request
     */
    public function __construct(Request $request)
    {
        $this->request = $request;
    }

    public function handle()
    {
        $model = null;

        if ($this->model) {
            // TODO: Change this to support multiple models
            $model = 'App\\'.$this->model;
            $model = new $model;
        }

        return $this->dispatchCommands($model);
    }

    /**
     * Get the commands for this operation.
     *
     * @return array
     */
    public function getCommands()
    {
        return $this->commands;
    }

    public function dispatchCommands($data)
    {

        // marshal and dispatch the commands
        foreach ($this->getCommands() as $command)
        {
            // keep wrapping values with data as expected by commands
            $values = compact('data');

            // when we get an array as a command it means
            // we need to call a command and send it extra arguments
            if (is_array($command)) {
                // get the command and and its arguments
                list($command, $args) = $command;
                // when the data is nothing (null) let's have it as an array
                if (!$values['data']) {
                    $values['data'] = [];
                }

                // data must be of the type array or array-able somehow
                $values = array_merge($values, $args);
            }

            $values = $this->dispatchFrom('App\Commands\\'.$command, $this->request, $values);
        }

        return $values;
    }
}
