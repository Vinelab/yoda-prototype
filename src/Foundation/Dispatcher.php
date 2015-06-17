<?php

namespace Sample\Foundation;

use Sample\Foundation\TransporterInterface;
use Illuminate\Contracts\Bus\Dispatcher as IlluminateDispatcher;
use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Http\Request;

/**
 * Class Dispatcher
 *
 * @category Commands Dispatcher
 * @package Sample\Foundation
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 * @author  Abed Halawi <abed.halawi@vinelab.com>
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
        foreach ($this->commands as $command) {
            $dispatcher->dispatchFromArray($command, ['transporter' => $transporter]);
        }

//        return $transporter->response();
        return 'Feature (' . get_class($this) . ') completed successfully.';
    }
}
