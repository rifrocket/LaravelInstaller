<?php

namespace RifRocket\LaravelInstaller\Tests;

use Orchestra\Testbench\TestCase;
use RifRocket\LaravelInstaller\LaravelInstallerServiceProvider;

class ExampleTest extends TestCase
{

    protected function getPackageProviders($app)
    {
        return [LaravelInstallerServiceProvider::class];
    }
    
    /** @test */
    public function true_is_true()
    {
        $this->assertTrue(true);
    }
}
