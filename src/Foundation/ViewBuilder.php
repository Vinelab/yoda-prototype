<?php

namespace Sample\Foundation;

class ViewBuilder extends Builder
{
    protected $parts = ['name', 'data', 'status', 'header'];

    protected $defaults = ['data' => [], 'status' => 200, 'header' => []];

    public function make()
    {
        return $this->toArray();
    }
}
