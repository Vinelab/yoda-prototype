<?php

namespace Sample\Applications\Cms;

use Sample\Foundation\FoundationServiceProvider;

class CmsServiceProvider extends FoundationServiceProvider
{
    public function register()
    {
        var_dump('registering CmsServiceProvider');
    }
}
