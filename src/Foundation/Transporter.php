<?php

namespace Sample\Foundation;

use Illuminate\Http\Request;

/**
 * Class Transporter
 *
 * @category
 * @package Sample\Foundation
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class Transporter implements TransporterInterface
{

    public function __construct(Request $request)
    {
        $this->set('request', $request);
    }

    /**
     * set data on this class
     *
     * @param $key
     * @param $value
     *
     * @return $this
     */
    public function set($key, $value)
    {
        $this->{$key} = $value;

        return $this;
    }

    /**
     * get data form this class
     *
     * @param $key
     *
     * @return mixed
     */
    public function get($key)
    {
        return $this->{$key};
    }

    /**
     * get data from the request attached on this class
     *
     * @param $key
     *
     * @return mixed
     */
    public function input($key)
    {
        return $this->request->{$key};
    }

}
