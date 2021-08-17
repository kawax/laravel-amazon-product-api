# Macroable

Extend any method by your self.

## Register in AppServiceProvider

```php

use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\api\DefaultApi;
use Amazon\ProductAdvertisingAPI\v1\Configuration;
use GuzzleHttp\Client;
use Revolution\Amazon\ProductAdvertising\Facades\AmazonProduct;
use Illuminate\Support\Facades\Config;

//...

    public function boot()
    {
        AmazonProduct::macro('reconfig', function (array $config) {
            $client = new Client();
                
            $conf = (new Configuration)
                            ->setAccessKey($config['api_key'])
                            ->setSecretKey($config['api_secret_key'])
                            ->setRegion($config['region'])
                            ->setHost($config['host']);
                            
            Config::set('amazon-product.associate_tag',$config['associate_tag']);
        
            $api = new DefaultApi($client, $conf);
            $this->apiUsing($api);
            
            return $this;
        });
    }
```

## Use somewhere
```php
$config = [
    'api_key'        => '',
    'api_secret_key' => '',
    'associate_tag'  => '',
    'host'           => '',
    'region'         => '',
];

AmazonProduct::reconfig($config);
```
