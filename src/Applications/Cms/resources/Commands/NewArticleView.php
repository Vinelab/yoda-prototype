<?php

namespace Sample\Applications\Cms\Resources\Commands;

use Illuminate\View\View;
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

//    public function __construct(
//        View $view
//    ) {
//         $this->view = $view;
//    }

    public function handle(View $view)
    {
//        $this->view->addLocation('src/Applications/Cms/Resources/Views');

        // return the view
//        return view()->file('/Users/mz/Codes/Projects/architecture-prototypes/lumen/yoda-prototype/src/Applications/Cms/Resources/Views/home.blade.php');
        return $view->make('home');
    }


    // 2. create instance of view

    // 1. change the path

    // 3. render the view


}
