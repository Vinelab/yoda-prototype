<?php

namespace Sample\Applications\Cms\Tests;

use Illuminate\Http\Request;
use Behat\Behat\Context\Context;
use Behat\Gherkin\Node\TableNode;
use Behat\Gherkin\Node\PyStringNode;
use PHPUnit_Framework_Assert as PHPUnit;
use Sample\Foundation\LaravelFeatureContext;
use Behat\Behat\Context\SnippetAcceptingContext;
use Behat\Behat\Tester\Exception\PendingException;

/**
 * Defines application features from the specific context.
 */
class CmsContext extends LaravelFeatureContext implements Context, SnippetAcceptingContext
{
    protected $payload = [];

    /**
     * Initializes context.
     *
     * Every scenario gets its own context instance.
     * You can also pass arbitrary arguments to the
     * context constructor through behat.yml.
     */
    public function __construct()
    {
    }

    /**
     * @Given I am logged in as :author
     */
    public function iAmLoggedInAs($author)
    {
        // log in as "$author"
    }

    /**
     * @Given I have :role access
     */
    public function iHaveAccess($role)
    {
        // grant role by slug to author
    }

    /**
     * @Given I have the payload:
     */
    public function iHaveThePayload(PyStringNode $payload)
    {
        $this->payload['_token'] = $this->getCsrfToken();
        $this->payload = array_merge($this->payload, json_decode($payload, true));
    }

    /**
     * @When I send a :verb request to :uri
     */
    public function iSendARequestTo($verb, $uri)
    {
        $this->response = $this->call($verb, $uri, $this->payload);
    }

    /**
     * @Then the response code should be :code
     */
    public function theResponseCodeShouldBe($code)
    {
        PHPUnit::assertEquals($this->response->status(), (int) $code);
    }

    /**
     * @Then the repsonse body should be:
     */
    public function theRepsonseBodyShouldBe(PyStringNode $body)
    {
        PHPUnit::assertEquals(json_decode($this->response->content()), json_decode($body));
    }

    /**
     * @When I send a :verb request to route :route
     */
    public function iSendARequestToRoute($verb, $route)
    {
        $this->route($verb, $route, $this->payload);
    }
}
