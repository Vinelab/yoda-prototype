<?php

namespace Sample\Foundation;

/**
 * @category Interface
 * @author Abed Halawi <abed.halawi@vinelab.com>
 */
interface CallerInterface
{
    public function call($command, $arguments);
}
