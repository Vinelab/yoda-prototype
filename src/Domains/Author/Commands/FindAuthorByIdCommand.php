<?php

namespace Sample\Domains\Author\Commands;

use Sample\Foundation\Command;
use Sample\Domains\Author\AuthorRepository;
use Illuminate\Contracts\Bus\SelfHandling;

class FindAuthorByIdCommand extends Command
{
    public function __construct($author_id = null)
    {
        $this->id = $author_id;
    }

    public function handle(AuthorRepository $authors)
    {
        return $authors->find($this->id);
    }
}
