<?php

namespace Sample\Foundation;

abstract class Builder implements BuilderInterface
{
    protected $parts = [];

    protected $defaults = [];

    protected $values = [];

    abstract public function make();

    /**
     * Get the array representation of the builder attributes.
     *
     * @return array
     */
    public function toArray()
    {
        $attributes = [];

        foreach ($this->parts as $part) {
            $attributes[$part] = $this->$part;
        }

        return array_merge($attributes, $this->defaults);
    }

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
