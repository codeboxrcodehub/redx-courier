<?php

namespace Codeboxr\RedxCourier;

use Illuminate\Support\ServiceProvider;
use Codeboxr\RedxCourier\Apis\AreaApi;
use Codeboxr\RedxCourier\Manage\Manage;
use Codeboxr\RedxCourier\Apis\StoreApi;
use Codeboxr\RedxCourier\Apis\OrderApi;

class RedxCourierServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . "/../config/redx.php" => config_path("redx.php")
        ]);
    }

    /**
     * Register application services
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../config/redx.php", "redx");

        $this->app->bind("redxcourier", function () {
            return new Manage(new AreaApi(), new StoreApi(), new OrderApi());
        });
    }

}
