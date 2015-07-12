<?php

namespace Sample\Foundation;

use Crypt;
use Behat\Behat\Context\Context;
use Illuminate\Contracts\Console\Kernel;
use Illuminate\Foundation\Testing\CrawlerTrait;
use Behat\Behat\Context\SnippetAcceptingContext;
use Illuminate\Foundation\Testing\AssertionsTrait;
use Illuminate\Foundation\Testing\ApplicationTrait;

/**
 * Base context to be used with Laravel-specific applications
 *
 * @author Abed Halawi <abed.halawi@vinelab.com>
 */
class LaravelFeatureContext implements Context, SnippetAcceptingContext
{
    /**
     * Provides a Laravel application instance.
     */
    use ApplicationTrait;

    /**
     * Provides Laravel assertion helpers
     */
    use AssertionsTrait;

    /**
     * Provides Laravel's request helpers
     */
    use CrawlerTrait;

    /**
     * The base URL to use while testing the application.
     *
     * @var string
     */
    protected $baseUrl = 'http://localhost';


    /**
     * @BeforeScenario
     */
    public function setUp()
    {
        if ( ! $this->app)
        {
            $this->refreshApplication();
        }
    }

    /**
     * Creates the application.
     *
     * @return \Symfony\Component\HttpKernel\HttpKernelInterface
     */
    public function createApplication()
    {
        $app = require __DIR__.'/../../bootstrap/app.php';

        $app->make(Kernel::class)->bootstrap();

        return $app;
    }

    public function getCsrfToken()
    {
        $response = $this->call('HEAD', '/');
        $cookies = $response->headers->getCookies();

        foreach ($cookies as $cookie) {
            if ($cookie->getName() === 'XSRF-TOKEN') {
                return Crypt::decrypt($cookie->getValue());
            }
        }
    }
}
