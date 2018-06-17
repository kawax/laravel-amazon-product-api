# Macroable

Extend any method by your self.

## Register in AppServiceProvider

```php
use ApaiIO\ApaiIO;
use ApaiIO\Configuration\GenericConfiguration;
use ApaiIO\Request\GuzzleRequest;
use ApaiIO\ResponseTransformer\XmlToArray;
use GuzzleHttp\Client;

//...

    public function boot()
    {
        \AmazonProduct::macro('reconfig', function (array $config) {
            $client = new Client();
        
            $request = new GuzzleRequest($client);
            $request->setScheme('https');
                
            $conf = new GenericConfiguration();
        
            $conf->setCountry($config['country'])
                 ->setAccessKey($config['api_key'])
                 ->setSecretKey($config['api_secret_key'])
                 ->setAssociateTag($config['associate_tag'])
                 ->setResponseTransformer(new XmlToArray())
                 ->setRequest($request);
        
            $apaiio = new ApaiIO($conf);
            $this->config($apaiio);
            
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
    'country'        => '',
];

\AmazonProduct::reconfig($config);
```
