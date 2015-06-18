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

    /**
     * @param \Illuminate\Http\Request $request
     */
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
        $result = null;

        if ($this->isExist($key)) {
            $result = $this->{$key};
        }

        return $result;
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

    /**
     * return the request instance
     *
     * @return mixed
     */
    public function request()
    {
        return $this->request;
    }

    /**
     * return the response instance
     *
     * @return mixed
     */
    public function response()
    {
        return $this->get('response');
    }

    /**
     * set data to the request
     *
     * @param $key
     * @param $value
     *
     * @return $this
     */
    public function setInput($key, $value)
    {
        $this->request->{$key} = $value;

        return $this;
    }

    /**
     * check if property exist on this class
     *
     * @param $property
     *
     * @return bool
     */
    private function isExist($property)
    {
        $result = false;
        if (property_exists($this, $property)) {
            $result = true;
        }

        return $result;
    }

}
