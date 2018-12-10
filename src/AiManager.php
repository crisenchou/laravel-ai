<?php
/**
 * author: crisen
 * email: crisen@crisen.org
 * date: 18-12-10
 * description:
 */

namespace Crisen\LaravelAi;


use Crisen\AI\DriverFactory;
use http\Exception\InvalidArgumentException;
use Illuminate\Support\Arr;

class AiManager
{
    
    protected $app;
    protected $factory;
    protected $drivers;

    public function __construct($app, DriverFactory $factory)
    {
        $this->app = $app;
        $this->factory = $factory;
    }


    public function driver($name)
    {
        $name = $name ?: $this->getDefaultDriver();

        $drivers = $this->app['config']['ai.drivers'];

        if (is_null($driver = Arr::get($drivers, $name))) {
            throw new InvalidArgumentException("Driver [{$name}] not configured");
        }

        return $this->makeDriver($name, $driver);
    }


    protected function getDefaultDriver()
    {
        return $this->app['config']['ai.default'];
    }


    protected function makeDriver($name, $config)
    {
        return $this->factory->make($name, $config);
    }

}