<?php

namespace Sample\Foundation;

/**
 * Class Command
 *
 * @category Command Abstract
 * @package  Sample\Foundation
 * @author   Mahmoud Zalt <mahmoud@vinelab.com>
 */
abstract class Command
{

    /**
     * @param \Sample\Foundation\Transporter $transporter
     */
    public function __construct(Transporter $transporter)
    {
        $this->transporter = $transporter;
    }

    /**
     * get instance of the transporter object
     *
     * @return \Sample\Foundation\Transporter
     */
    public function transporter()
    {
        return $this->transporter;
    }

    /**
     * set data on the transporter (to be passed to the next command)
     *
     * @param $key
     * @param $value
     *
     * @return $this
     */
    public function set($key, $value)
    {
        return $this->transporter()->set($key, $value);
    }

    /**
     * get data from the transporter (from previous commands)
     *
     * @param $key
     *
     * @return mixed
     */
    public function get($key)
    {
        return $this->transporter()->get($key);
    }

    /**
     * get request input data (from the transporter object)
     *
     * @param $key
     *
     * @return mixed
     */
    public function input($key)
    {
        return $this->transporter()->input($key);
    }

}
