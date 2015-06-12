<?php

namespace Sample\Domains\Article\Commands;

use Sample\Domains\Article\Services\StringFormatter;
use Sample\Foundation\Command;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class FormatArticleTitle
 *
 * @category
 * @package Sample\Domains\Article\Commands
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class FormatArticleTitle extends Command implements SelfHandling
{

    private $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function handle()
    {
        return StringFormatter::removeWhiteSpace($this->title);
    }

}
