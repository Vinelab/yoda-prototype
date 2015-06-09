<?php

namespace Sample\Applications\Analytics;

use Sample\Foundation\FoundationServiceProvider;

class AnalyticsServiceProvider extends FoundationServiceProvider
{
    public function register()
    {
        var_dump('registering AnalyticsServiceProvider');
    }
}
