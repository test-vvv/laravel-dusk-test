<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Laravel\Dusk\Browser;

class DuskBrowserServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        Browser::macro('scrollTo', function ($className) {
            $this->script("document.getElementsByClassName(\"{$className}\")[0].scrollIntoView()");

            return $this;
        }

        );
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
