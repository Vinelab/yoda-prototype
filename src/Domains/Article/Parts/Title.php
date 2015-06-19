<?php

namespace Sample\Domains\Article\Parts;

class Title
{
    private $title;

    public function __construct($title)
    {
        $this->title = $title;
    }

    public function __toString()
    {
        return (string) $this->title;
    }
}
