<?php

namespace Revolution\Amazon\ProductAdvertising\Providers;

use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\api\DefaultApi;
use Amazon\ProductAdvertisingAPI\v1\Configuration;
use GuzzleHttp\Client;
use Illuminate\Support\ServiceProvider;
use Revolution\Amazon\ProductAdvertising\AmazonClient;
use Revolution\Amazon\ProductAdvertising\Contracts\Factory;

class AmazonProductServiceProvider extends ServiceProvider
{
    /**
     * Register the application services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/amazon-product.php',
            'amazon-product'
        );

        $this->app->singleton(DefaultApi::class, function ($app) {
            $config = (new Configuration())
                ->setAccessKey(config('amazon-product.api_key'))
                ->setSecretKey(config('amazon-product.api_secret_key'))
                ->setRegion(config('amazon-product.region'))
                ->setHost(config('amazon-product.host'));

            return new DefaultApi(new Client(), $config);
        });

        $this->app->singleton(Factory::class, AmazonClient::class);
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot(): void
    {
        if ($this->app->runningInConsole()) {
            $this->publishes(
                [
                    __DIR__.'/../../config/amazon-product.php' => config_path('amazon-product.php'),
                ],
                'amazon-product-config'
            );
        }
    }
}
