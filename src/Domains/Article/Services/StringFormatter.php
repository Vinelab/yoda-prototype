<?php

namespace Sample\Domains\Article\Services;

/**
 * Class StringFormatter
 *
 * @category
 * @package Sample\Domains\Article\Services
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
class StringFormatter // extends Service
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

}
