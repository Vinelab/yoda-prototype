<?php

namespace Sample\Domains\Article\Commands;

use Illuminate\Contracts\Bus\SelfHandling;
use Sample\Domains\Article\Services\StringFormatterService;
use Sample\Foundation\Command;

/**
 * Class FormatArticleBody
 *
 * @category Command
 * @package Sample\Domains\Article\Commands
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class FormatArticleBodyCommand extends Command implements SelfHandling
{

    public function handle()
    {
        $body = $this->input('body');
        $article = $this->get('article');

        $article->body = StringFormatterService::convertToUppercase($body);

        $this->set('article', $article);
    }

}
