<?php

namespace Revolution\Amazon\ProductAdvertising\Providers;

use Illuminate\Support\ServiceProvider;

use ApaiIO\ApaiIO;
use ApaiIO\Configuration\GenericConfiguration;
use ApaiIO\Request\GuzzleRequest;
use ApaiIO\ResponseTransformer\XmlToArray;
use GuzzleHttp\Client;

use Revolution\Amazon\ProductAdvertising\AmazonClient;
use Revolution\Amazon\ProductAdvertising\ResponseTransformer\XmlToCollection;

class AmazonProductServiceProvider extends ServiceProvider
{
    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/amazon-product.php' => config_path('amazon-product.php'),
        ]);

        $this->mergeConfigFrom(
            __DIR__ . '/../config/amazon-product.php', 'amazon-product'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(AmazonClient::class, function ($app) {
            $conf = new GenericConfiguration();
            $client = new Client();

            $request = new GuzzleRequest($client);
            $request->setScheme('https');

            $config = $app['config']['amazon-product'];

            $conf->setCountry($config['country'])
                 ->setAccessKey($config['api_key'])
                 ->setSecretKey($config['api_secret_key'])
                 ->setAssociateTag($config['associate_tag'])
                 ->setResponseTransformer(new XmlToArray())
                 ->setRequest($request);

            $apaiio = new ApaiIO($conf);

            return new AmazonClient($apaiio);
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return string[]
     */
    public function provides()
    {
        return [AmazonClient::class];
    }
}
