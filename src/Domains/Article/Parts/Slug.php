<?php

namespace Sample\Domains\Article\Parts;

class Slug
{
    private $slug;

    public function __construct($title)
    {
        $this->slug = str_replace(' ', '-', strtolower($title));
    }

    public function __toString()
    {
        return (string) $this->slug;
    }
}
