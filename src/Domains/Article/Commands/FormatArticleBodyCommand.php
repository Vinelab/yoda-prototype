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

    private $entity;

    private $body;

    public function __construct($data, $body)
    {
        $this->entity = $data;
        $this->body = $body;
    }

    public function handle()
    {
        $this->entity->body = StringFormatterService::convertToUppercase($this->body);

        return $this->entity;
    }
}
