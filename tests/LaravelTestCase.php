<?php

namespace OneCode\Translation\Tests;

use Dotenv\Dotenv;
use OneCode\Translation\OneCodeTranslationServiceProvider;
use Orchestra\Testbench\TestCase as Orchestra;

class LaravelTestCase extends Orchestra
{
    protected function setUp(): void
    {
        $dotenv = Dotenv::createImmutable(__DIR__ . '/..');
        $dotenv->load();
        parent::setUp();
//
    }

    protected function getPackageProviders($app)
    {
        return [
            OneCodeTranslationServiceProvider::class,
        ];
    }

    protected function getEnvironmentSetUp($app)
    {
//        $app['config']->set('database.default', 'testbench');
//        $app['config']->set('database.connections.testbench', [
//            'driver' => 'sqlite',
//            'database' => ':memory:',
//            'prefix' => '',
//        ]);
    }
}