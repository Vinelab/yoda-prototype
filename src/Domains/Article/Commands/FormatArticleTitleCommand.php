<?php

namespace Sample\Domains\Article\Commands;

use Illuminate\Contracts\Bus\SelfHandling;
use Sample\Domains\Article\Services\StringFormatterService;
use Sample\Foundation\Command;
use Sample\Foundation\Transporter;

/**
 * Class FormatArticleTitle
 *
 * @category Command
 * @package Sample\Domains\Article\Commands
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class FormatArticleTitleCommand extends Command implements SelfHandling
{

    public function handle()
    {
        $title = $this->input('title');
        $article = $this->get('article');

        $article->title = StringFormatterService::removeWhiteSpace($title);

        $this->set('article', $article);
    }

}
