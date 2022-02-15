<?php

namespace Dealskoo\Country\Tests;

use Dealskoo\Country\Providers\CountryServiceProvider;

abstract class TestCase extends \Dealskoo\Admin\Tests\TestCase
{
    protected function getPackageProviders($app)
    {
        return [
            CountryServiceProvider::class
        ];
    }

    protected function getPackageAliases($app)
    {
        return [];
    }
}
