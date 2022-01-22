# Amazon Product Advertising API for Laravel

[![Build Status](https://travis-ci.com/kawax/laravel-amazon-product-api.svg?branch=master)](https://travis-ci.com/kawax/laravel-amazon-product-api)
[![Maintainability](https://api.codeclimate.com/v1/badges/d835c616dc9f95faf516/maintainability)](https://codeclimate.com/github/kawax/laravel-amazon-product-api/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/d835c616dc9f95faf516/test_coverage)](https://codeclimate.com/github/kawax/laravel-amazon-product-api/test_coverage)

## End of active support (2020/06)
My API account has been banned, so my active support is over. However, PR is accepted.

## Requirements
- PHP >= 7.4
- Laravel >= 6.0

## Versioning
- Basic : semver
- Drop old PHP or Laravel version : `+0.1`. composer should handle it well.
- Support only latest major version (`master` branch), but you can PR to old branches.

## Installation

### Composer
```
composer require revolution/laravel-amazon-product-api
```

### Publishing config (Optional)
```bash
php artisan vendor:publish --tag=amazon-product-config
```

### .env
```bash
AMAZON_API_KEY=
AMAZON_API_SECRET_KEY=
AMAZON_ASSOCIATE_TAG=
AMAZON_HOST=webservices.amazon.com
AMAZON_REGION=us-east-1
```

### Country lists
https://webservices.amazon.com/paapi5/documentation/common-request-parameters.html

## Note
- API Rate limit https://webservices.amazon.com/paapi5/documentation/troubleshooting/api-rates.html

## Usage

```php
<?php
use Revolution\Amazon\ProductAdvertising\Facades\AmazonProduct;

# string $category, string $keyword = null, int $page = 1
$response = AmazonProduct::search('All', 'amazon' , 1);
dd($response);
# returns normal array

# string $browse Browse node
$response = AmazonProduct::browse('1');

# string $asin ASIN
$response = AmazonProduct::item('ASIN1');

# array $asin ASIN
$response = AmazonProduct::items(['ASIN1', 'ASIN2']);

# setIdType: support only item() and items()
$response = AmazonProduct::setIdType('EAN')->item('EAN');
# reset to ASIN
AmazonProduct::setIdType('ASIN');
# PA-APIv5 not support EAN?
```

`browse()` is not contains detail data.

```php
$response = AmazonProduct::browse('1');
$nodes = data_get($response, 'BrowseNodesResult');
$items = data_get($nodes, 'BrowseNodes.TopSellers.TopSeller');
$asins = data_get($items, '*.ASIN');
$results = AmazonProduct::items($asins);
# PA-APIv5 not support TopSeller?
```

Probably, you need try-catch or Laravel's `rescue()` helper.

```php
try {
    $response = AmazonProduct::browse('1');
} catch(ApiException $e) {

}

$response = rescue(function () use ($browse_id) {
                return AmazonProduct::browse($browse_id);
            }, []);
```

## LICENSE
MIT  
Copyright kawax
