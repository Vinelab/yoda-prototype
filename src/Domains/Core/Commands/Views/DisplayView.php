<?php

namespace Sample\Domains\Core\Commands\Views;

use Illuminate\Contracts\Bus\SelfHandling;
use Sample\Foundation\Command;

/**
 * Class DisplayView
 *
 * @category
 * @package Sample\Applications\Cms\Resources\Commands
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class DisplayView extends Command implements SelfHandling
{

    /**
     * @var
     */
    private $view;

    /**
     * @param $view
     */
    public function __construct($view)
    {
        $this->view = $view;
    }

    public function handle()
    {
        return view($this->view);
    }
}
