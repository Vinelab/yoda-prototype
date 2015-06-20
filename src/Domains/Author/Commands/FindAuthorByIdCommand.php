<?php

namespace Sample\Domains\Author\Commands;

use Sample\Foundation\Command;
use Sample\Domains\Author\AuthorRepository;
use Illuminate\Contracts\Bus\SelfHandling;

class FindAuthorByIdCommand extends Command implements SelfHandling
{
    public function __construct($author_id)
    {
        $this->id = $author_id;
    }

    public function handle(AuthorRepository $authors)
    {
        return $authors->find($this->id);
    }
}
