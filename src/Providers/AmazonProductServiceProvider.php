<?php

namespace Revolution\Amazon\ProductAdvertising\Providers;

use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\api\DefaultApi;
use Amazon\ProductAdvertisingAPI\v1\Configuration;
use GuzzleHttp\Client;
use Illuminate\Contracts\Support\DeferrableProvider;
use Illuminate\Support\ServiceProvider;
use Revolution\Amazon\ProductAdvertising\AmazonClient;
use Revolution\Amazon\ProductAdvertising\Contracts\Factory;

class AmazonProductServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/amazon-product.php',
            'amazon-product'
        );

        $this->app->singleton(
            DefaultApi::class,
            function ($app) {
                $config = (new Configuration())
                    ->setAccessKey(config('amazon-product.api_key'))
                    ->setSecretKey(config('amazon-product.api_secret_key'))
                    ->setRegion(config('amazon-product.region'))
                    ->setHost(config('amazon-product.host'));

                return new DefaultApi(new Client(), $config);
            }
        );

        $this->app->singleton(Factory::class, AmazonClient::class);
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes(
            [
                __DIR__.'/../../config/amazon-product.php' => config_path('amazon-product.php'),
            ],
            'amazon-product-config'
        );
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [
            Factory::class,
            DefaultApi::class,
        ];
    }
}
