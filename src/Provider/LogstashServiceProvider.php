<?php

namespace Wufly\Provider;

use Illuminate\Support\ServiceProvider;

class LogstashServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {

    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //publish
        $this->publishes([
            __DIR__ . '/../config/logstash.php' => config_path('logstash.php'),
        ]);
    }
}
