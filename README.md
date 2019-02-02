# Amazon Product Advertising API for Laravel

[![Build Status](https://travis-ci.org/kawax/laravel-amazon-product-api.svg?branch=master)](https://travis-ci.org/kawax/laravel-amazon-product-api)

## Requirements
- PHP >= 7.1
- Laravel >= 5.6

## Installation

### Composer
```
composer require revolution/laravel-amazon-product-api
```

### config/amazon-product.php
```bash
php artisan vendor:publish --provider="Revolution\Amazon\ProductAdvertising\Providers\AmazonProductServiceProvider"
```

### .env
```bash
AMAZON_API_KEY=
AMAZON_API_SECRET_KEY=
AMAZON_ASSOCIATE_TAG=
AMAZON_COUNTRY=com
```

### Country lists
https://docs.aws.amazon.com/AWSECommerceService/latest/DG/Locales.html

e.g.
- US=com
- UK=co.uk

## Note
- API Rate limit https://docs.aws.amazon.com/AWSECommerceService/latest/DG/TroubleshootingApplications.html
- entity decode https://forums.aws.amazon.com/ann.jspa?annID=5543

```php
html_entity_decode($txt, ENT_HTML401, "UTF-8");
```

## Usage

This package depends on https://github.com/Exeu/apai-io

```php
<?php
use AmazonProduct;

# string $category, string $keyword = null, int $page = 1
$response = AmazonProduct::search('All', 'amazon' , 1);
dd($response);
# returns normal array

# string $browse Browse node
$response = AmazonProduct::browse('1');
# sort by TopSeller

# Response Group: NewReleases
$response = AmazonProduct::browse('1', 'NewReleases');

# string $asin ASIN
$response = AmazonProduct::item('ASIN1');

# array $asin ASIN
$response = AmazonProduct::items(['ASIN1', 'ASIN2']);

# setIdType: support only item() and items()
$response = AmazonProduct::setIdType('EAN')->item('EAN');
# reset to ASIN
AmazonProduct::setIdType('ASIN');

```

`browse()` is not contains detail data.

```php
$response = AmazonProduct::browse('1');
$nodes = data_get($response, 'BrowseNodes');
$items = data_get($nodes, 'BrowseNode.TopSellers.TopSeller');
$asins = data_get($items, '*.ASIN');
$results = AmazonProduct::items($asins);
```

Probably, you need try-catch or Laravel's `rescue()` helper.

```php
try {
    $response = AmazonProduct::browse('1');
} catch() {

}

$response = rescue(function () use ($browse_id) {
                return AmazonProduct::browse($browse_id);
            }, []);
```

### Run operation

```php
<?php
use AmazonProduct;
use ApaiIO\Operations\Search;

$search = new Search();

$search->setCategory('All');
$search->setKeywords('amazon');
$search->setResponseGroup(['Large']);

$response = AmazonProduct::run($search);
dd($response);
# returns normal array
```

### reconfig

```php
<?php
use ApaiIO\ApaiIO;
use ApaiIO\Configuration\GenericConfiguration;
use ApaiIO\Request\GuzzleRequest;
use ApaiIO\ResponseTransformer\XmlToArray;
use GuzzleHttp\Client;

$client = new Client();

$request = new GuzzleRequest($client);
$request->setScheme('https');

$config = config('amazon-product');

$conf = new GenericConfiguration();

$conf->setCountry($config['country'])
     ->setAccessKey($config['api_key'])
     ->setSecretKey($config['api_secret_key'])
     ->setAssociateTag($config['associate_tag'])
     ->setResponseTransformer(new XmlToArray())
     ->setRequest($request);

$apaiio = new ApaiIO($conf);

AmazonProduct::config($apaiio);
```

## LICENSE
MIT  
Copyright kawax
