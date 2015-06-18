<?php

namespace Sample\Foundation;

use Illuminate\Contracts\Bus\Dispatcher as IlluminateDispatcher;
use Illuminate\Contracts\Bus\SelfHandling;
use Sample\Foundation\Helpers\Inflect;

/**
 * Class Dispatcher
 *
 * @category Commands Dispatcher
 * @package  Sample\Foundation
 * @author   Mahmoud Zalt <mahmoud@vinelab.com>
 * @author   Abed Halawi <abed.halawi@vinelab.com>
 */
class Dispatcher implements SelfHandling
{

    /**
     * The dispatchable commands in sequential order
     *
     * @var array
     */
    protected $commands = [];

    /**
     * Dispatch feature commands one by one in sequential order and pass data
     * between them through the Transporter object.
     *
     * @param \Illuminate\Contracts\Bus\Dispatcher    $dispatcher
     * @param \Sample\Foundation\TransporterInterface $transporter
     *
     * @return string
     */
    public function handle(IlluminateDispatcher $dispatcher, TransporterInterface $transporter)
    {
        foreach ($this->commands as $key => $command) {

            // check if the command is of type [foreach:inputs] (means containing a set of commands that needs to run multiple times)
            if ($this->isForeacher($key)) {

                // get the input name form the `foreach:InputName`
                $inputName = $this->getInputName($key);
                // set the input on the transporter
                $inputData = $transporter->input($inputName);

                // TODO: support if photo was expected to me multiple but it was singular (convert to multiple anyway)
                foreach ($inputData as $input) {

                    // convert input name to singular to be served with the commands
                    $singularInputName = Inflect::singularize($inputName);
                    // set the input value on the transporter to be passed to each command loop
                    $transporter->setInput($singularInputName, $input);

                    // dispatch all the commands found under the [foreach:]
                    foreach ($command as $key => $value) {
                        $this->dispatch($dispatcher, $value, $transporter);
                    }

                }

            } else {
                $this->dispatch($dispatcher, $command, $transporter);
            }

        }

        return $transporter->response();
    }


    /**
     * @param $dispatcher
     * @param $command
     * @param $transporter
     */
    private function dispatch($dispatcher, $command, $transporter)
    {
        $dispatcher->dispatchFromArray($command, ['transporter' => $transporter]);
    }

    /**
     * check if the command key is `foreach`
     *
     * @param $input
     *
     * @return bool
     */
    private function isForeacher($input)
    {
        $answer = false;
        if (0 === strpos($input, 'foreach:')) {
            $answer = true;
        }

        return $answer;
    }

    /**
     * gets the input name from `foreach:inputName`
     *
     * @param $key
     *
     * @return string
     */
    private function getInputName($key)
    {
        return substr($key, strpos($key, ":") + 1);
    }

}
