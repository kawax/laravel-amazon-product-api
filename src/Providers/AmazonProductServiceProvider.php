<?php

namespace Revolution\Amazon\ProductAdvertising\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\api\DefaultApi;
use Amazon\ProductAdvertisingAPI\v1\Configuration;

use GuzzleHttp\Client;

use Revolution\Amazon\ProductAdvertising\Contracts\Factory;
use Revolution\Amazon\ProductAdvertising\AmazonClient;

class AmazonProductServiceProvider extends ServiceProvider implements DeferrableProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../config/amazon-product.php' => config_path('amazon-product.php'),
        ]);
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(
            __DIR__.'/../config/amazon-product.php', 'amazon-product'
        );

        $this->app->singleton(DefaultApi::class, function ($app) {
            $config = (new Configuration)
                ->setAccessKey(config('amazon-product.api_key'))
                ->setSecretKey(config('amazon-product.api_secret_key'))
                ->setRegion(config('amazon-product.region'))
                ->setHost(config('amazon-product.host'));

            return new DefaultApi(new Client, $config);
        });

        $this->app->singleton(Factory::class, AmazonClient::class);
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
