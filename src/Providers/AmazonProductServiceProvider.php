<?php

namespace Revolution\Amazon\ProductAdvertising\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\Support\DeferrableProvider;

use ApaiIO\ApaiIO;
use ApaiIO\Configuration\GenericConfiguration;
use ApaiIO\Configuration\ConfigurationInterface;
use ApaiIO\Request\GuzzleRequest;
use ApaiIO\Request\RequestInterface;
use ApaiIO\ResponseTransformer\XmlToArray;

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

        $this->app->singleton(RequestInterface::class, function ($app) {
            $request = new GuzzleRequest($this->app->make(Client::class));
            $request->setScheme('https');

            return $request;
        });

        $this->app->singleton(ConfigurationInterface::class, function ($app) {
            return (new GenericConfiguration)
                ->setCountry(config('amazon-product.country'))
                ->setAccessKey(config('amazon-product.api_key'))
                ->setSecretKey(config('amazon-product.api_secret_key'))
                ->setAssociateTag(config('amazon-product.associate_tag'))
                ->setResponseTransformer(new XmlToArray)
                ->setRequest($this->app->make(RequestInterface::class));
        });

        $this->app->singleton(ApaiIO::class, function ($app) {
            return new ApaiIO($this->app->make(ConfigurationInterface::class));
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
            ApaiIO::class,
            RequestInterface::class,
            ConfigurationInterface::class,
        ];
    }
}
