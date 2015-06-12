<?php

namespace Sample\Domains\Article\Commands;

use Illuminate\Contracts\Bus\SelfHandling;
use Sample\Domains\Article\Services\StringFormatter;
use Sample\Foundation\Command;

/**
 * Class FormatArticleBody
 *
 * @category
 * @package Sample\Domains\Article\Commands
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class FormatArticleBody extends Command implements SelfHandling
{

    private $entity;

    private $body;

    public function __construct($data, $body)
    {
        $this->entity = $data;
        $this->body = $body;
    }

    public function handle()
    {
        $this->entity->body = StringFormatter::convertToUppercase($this->body);

        return $this->entity;
    }
}
