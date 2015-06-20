<?php

namespace Sample\Foundation;

interface BuilderInterface
{
    /**
     * Get the array representation of the builder attributes.
     *
     * @return array
     */
    public function toArray();

    public function make();
}
