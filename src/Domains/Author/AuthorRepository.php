<?php

namespace Sample\Domains\Author;

use Sample\Domains\Author\Entities\Author;

class AuthorRepository
{
    public function find($id)
    {
        return new Author();
    }
}
