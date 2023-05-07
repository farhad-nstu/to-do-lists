<?php

namespace farhad\RequestValidator;

use Illuminate\Support\ServiceProvider;

class RequestValidatorServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->loadRoutesFrom(__DIR__.'/routes.php');
    }

}