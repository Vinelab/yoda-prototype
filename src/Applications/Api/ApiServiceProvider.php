<?php

namespace Sample\Applications\Api;

use Sample\Foundation\FoundationServiceProvider;

class ApiServiceProvider extends FoundationServiceProvider
{
    public function register()
    {
        var_dump('registering ApiServiceProvider');
    }
}
