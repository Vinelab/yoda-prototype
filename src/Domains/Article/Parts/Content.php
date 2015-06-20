<?php

namespace Sample\Domains\Article\Parts;

class Content
{
    private $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function __toString()
    {
        return (string) $this->content;
    }
}
