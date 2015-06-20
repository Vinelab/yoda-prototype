<?php

namespace Sample\Domains\Photo;

use Sample\Domains\Photo\Entities\Photo;

class PhotoFactory
{
    public function make($details)
    {
        return new Photo();
    }

    /**
     * Allow calling methods statically on this class.
     *
     * @param  string $name
     * @param  array $arguments
     * @return mixed
     */
    public static function __callStatic($name, $arguments)
    {
        return call_user_func_array([new static(), $name], $arguments);
    }
}
