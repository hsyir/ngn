<?php

namespace Hsy\Ngn\Tests;

use Hsy\Ngn\HsyNgnServiceProvider;
use Hsy\Ngn\Models\Number;
use Illuminate\Database\Schema\Blueprint;

abstract class TestCase extends \Orchestra\Testbench\TestCase
{

    /** @var \Spatie\Permission\Test\User */
    protected $testUser;


    protected function setUp(): void
    {
        parent::setUp();
//        $this->withFactories(__DIR__ . '/../database/factories');
        $this->loadMigrationsFrom(__DIR__ . '/../database/migrations');
        /*   $this->artisan("migrate", [
               "--database" => "testing",
               "--realpath" => realpath(__DIR__ . "../vendor/spatie/laravel-permission/database/migrations/create_permission_tables.php.stub")
           ])->run();*/

        $this->setUpDatabase($this->app);

    }

    /**
     * Bootstrap any service providers here.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageProviders($app)
    {
        return [
            HsyNgnServiceProvider::class,
        ];
    }

    /**
     * Bootstrap any aliases here.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return array
     */
    protected function getPackageAliases($app)
    {
        return [
        ];
    }

    /**
     * Define environment setup.
     *
     * @param \Illuminate\Foundation\Application $app
     *
     * @return void
     */
    protected function getEnvironmentSetUp($app)
    {
        // Setup default database to use sqlite :memory:
        $app['config']->set(
            'ngn.drivers',
            [
                "Database" => [
                    "0211111", "0219999"
                ],
                "api" => [
                    "0514444"
                ],
                "NoDriver" => [
                    "0317777"
                ],
            ]
        );
        $app['config']->set('app.locale', 'fa');
        $app['config']->set('app.timezone', 'Asia/tehran');
        $app['config']->set('database.default', 'testdb');
        $app['config']->set('database.connections.testdb', [
            'driver' => 'sqlite',
            'database' => ':memory:',
        ]);

    }


    /**
     * Set up the database.
     *
     * @param \Illuminate\Foundation\Application $app
     */
    protected function setUpDatabase($app)
    {
        Number::insert([
            [
                "pre_number"=>"021",
                "mid_number"=>"9999",
                "number"=>"1111",
            ]
        ]);

    }

}
