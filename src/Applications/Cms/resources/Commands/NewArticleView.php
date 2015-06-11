<?php

namespace Sample\Applications\Cms\Resources\Commands;

use Sample\Foundation\Command;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class RenderCreateNewArticleView
 *
 * @category
 * @package Sample\Domains\Article\Commands
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class NewArticleView extends Command implements SelfHandling
{
    public function handle()
    {
        return view('cms::home');
    }


    // 2. create instance of view

    // 1. change the path

    // 3. render the view


}
