<?php

namespace Yab\Mint\Tests;

use Orchestra\Testbench\TestCase as OrchestraTestCase;

abstract class TestCase extends OrchestraTestCase
{
    /**
     * Setup the test environment.
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->loadMigrationsFrom(__DIR__ . '/Migrations');
    }

    /**
     * Load our custom service provider for test purposes.
     *
     * @param $app
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [ 'Yab\Mint\MintServiceProvider' ];
    }
}
