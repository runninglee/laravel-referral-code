<?php

namespace HuiLee\ReferralCode;

use Illuminate\Support\ServiceProvider;

class ReferralCodeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register()
    {
        $this->app->singleton('referralCode', function () {
            return new ReferralCode();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot()
    {
        //
    }
}
