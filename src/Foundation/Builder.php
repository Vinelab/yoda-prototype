<?php

namespace Sample\Foundation;

abstract class Builder
{
    protected $parts = [];

    protected $values = [];

    abstract public function make();

    public function __set($name, $value)
    {
        if (in_array($name, $this->parts)) {
            $this->values[$name] = $value;
        }
    }

    public function __get($name)
    {
        if (isset($this->$name)) {
            return $this->values[$name];
        }
    }

    public function __isset($name)
    {
        return isset($this->values[$name]);
    }
}
