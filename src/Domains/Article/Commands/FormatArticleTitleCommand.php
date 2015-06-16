<?php

namespace Sample\Domains\Article\Commands;

use Illuminate\Contracts\Bus\SelfHandling;
use Sample\Domains\Article\Services\StringFormatterService;
use Sample\Foundation\Command;

/**
 * Class FormatArticleTitle
 *
 * @category Command
 * @package Sample\Domains\Article\Commands
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class FormatArticleTitleCommand extends Command implements SelfHandling
{

    private $entity;

    private $title;

    /**
     * @param $entity
     * @param $title
     */
    public function __construct($entity, $title)
    {
        $this->entity = $entity;
        $this->title = $title;
    }

    public function handle()
    {
        $this->entity->title = StringFormatterService::removeWhiteSpace($this->title);

        return $this->entity;
    }

}
