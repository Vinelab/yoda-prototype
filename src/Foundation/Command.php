<?php

namespace Sample\Foundation;

/**
 * Class Command
 *
 * @category Command Abstract
 * @package Sample\Foundation
 * @author  Mahmoud Zalt <mahmoud@vinelab.com>
 */
abstract class Command
{

    public function __construct($data)
    {
        $this->data = $data;
    }

    public function entity()
    {
        return $this->data;
    }

}
