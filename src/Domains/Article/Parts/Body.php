<?php

namespace Sample\Domains\Article\Parts;

class Body
{
    private $text;

    public function __construct($text)
    {
        $this->text = $text;
    }

    public function __toString()
    {
        return (string) $this->text;
    }
}
