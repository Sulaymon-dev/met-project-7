<?php

namespace App\Providers;

use PHPUnit\Framework\Assert as PHPUnit;
use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\Browser;


class DuskServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Browser::macro('assertsElementHasClass', function ($element, $class){

            PHPUnit::assertTrue(
                in_array("$class", explode(" ",
                $this->attribute($element, 'class'))),
                "Did not see expected value [$class] within element [$element]"
            );

            return $this;
        });
    }
}
