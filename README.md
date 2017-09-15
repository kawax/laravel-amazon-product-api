# Amazon Product Advertising API for Laravel

[![Build Status](https://travis-ci.org/kawax/laravel-amazon-product-api.svg?branch=master)](https://travis-ci.org/kawax/laravel-amazon-product-api)

## Requirements
- PHP >= 7.0
- Laravel >= 5.5

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
AMAZON_COUNTRY=
```

## Usage

This package depends on https://github.com/Exeu/apai-io

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

### Convenient method

```php
<?php
use AmazonProduct;

# string $category, string $keyword = null, int $page = 1
$response = AmazonProduct::search('All', 'amazon' , 1);
dd($response);

# string $browse Browse node
$response = AmazonProduct::browse('1');
dd($response);
# sort by TopSeller

# string $asin ASIN
$response = AmazonProduct::item('ASIN1');
dd($response);

# array $asin ASIN
$response = AmazonProduct::items(['ASIN1', 'ASIN2']);
dd($response);
```

`browse()` is not contains detail data.

```php
$response = AmazonProduct::browse('1');
$nodes = array_get($response, 'BrowseNodes');
$items = array_get($nodes, 'BrowseNode.TopSellers.TopSeller');
$items = collect($items)->pluck('ASIN');
$results = AmazonProduct::items($items->toArray());
```

## LICENSE
MIT  
Copyright kawax
