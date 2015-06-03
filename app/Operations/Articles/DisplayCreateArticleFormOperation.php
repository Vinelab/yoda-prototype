<?php

namespace App\Operations\Article;

use App\Operations\Operation;

/**
 * Display the form to create an article.
 *
 * @category Operation
 * @author Abed Halawi <abed.halawi@vinelab.com>
 */
class DisplayCreateArticleFormOperation extends Operation
{
    protected $commands = [
        [
            'Response\DisplayViewCommand',
            [
                'name' => 'articles.create'
            ]
        ],
    ];
}
