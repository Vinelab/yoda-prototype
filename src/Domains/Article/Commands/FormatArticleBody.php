<?php

namespace Sample\Domains\Article\Commands;

use Sample\Foundation\Command;
use Illuminate\Contracts\Bus\SelfHandling;

/**
 * Class FormatArticleBody
 *
 * @category
 * @package Sample\Domains\Article\Commands
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class FormatArticleBody extends Command implements SelfHandling
{

    private $body;

    public function __construct($body)
    {
        $this->body = $body;
    }
    
    public function handle()
    {
        return $this->body;
    }

}
