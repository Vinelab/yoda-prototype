<?php

namespace Sample\Domains\Article\Services;

use Sample\Foundation\Service;

/**
 * Class StringFormatter
 *
 * @category
 * @package Sample\Domains\Article\Services
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class StringFormatterService extends Service
{
    /**
     * @param $string
     *
     * @return mixed
     */
    public static function removeWhiteSpace($string)
    {
        return str_replace(' ', '', $string);
    }
    /**
     * @param $string
     *
     * @return mixed
     */
    public static function convertToUppercase($string)
    {
        return strtoupper($string);
    }

}
