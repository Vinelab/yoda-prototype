<?php

namespace Sample\Foundation;

use Illuminate\Contracts\Bus\SelfHandling;
use Illuminate\Routing\Controller as BaseController;

/**
 * Class Feature
 *
 * @category Bus
 * @author Abed Halawi <abed.halawi@vinelab.com>
 */
abstract class Feature implements CallerInterface, SelfHandling
{
    use CallerTrait;
}
