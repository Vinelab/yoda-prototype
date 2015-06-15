<?php

namespace Sample\Domains\Article\Commands;

use Sample\Foundation\Command;
use Sample\Domains\Article\Entities\Article;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * return the empty entity
 *
 * @category Command
 * @package Sample\Domains\Article\Commands
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class AttachPhotosToArticleCommand extends Command implements SelfHandling
{
    public function __construct($data)
    {
         dd('attach', $data);
    }

    public function handle()
    {

    }

}
