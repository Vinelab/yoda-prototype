<?php

namespace Sample\Domains\Author;

use Sample\Domains\Author\Entities\Author;

class AuthorService
{
    public function byId($id)
    {
        return new Author();
    }
}
