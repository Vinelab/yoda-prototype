<?php

namespace Sample\Foundation;

use Illuminate\Foundation\Bus\DispatchesJobs;

trait CallerTrait
{
    use DispatchesJobs;

    /**
     * beautifier function to be called instead of the laravel function dispatchFromArray
     *
     * @param $command
     * @param $arguments
     *
     * @return mixed
     */
    public function call($command, $arguments)
    {
        return $this->dispatchFromArray($command, $arguments);
    }

}
