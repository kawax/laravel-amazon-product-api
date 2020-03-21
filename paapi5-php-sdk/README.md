# Product Advertising API 5.0 SDK for PHP

[![Version](https://img.shields.io/packagist/v/amzn/paapi5-php-sdk)](https://img.shields.io/packagist/v/amzn/paapi5-php-sdk) 

[![Total Downloads](https://img.shields.io/packagist/dt/amzn/paapi5-php-sdk.svg?style=flat)](https://packagist.org/packages/amzn/paapi5-php-sdk)

This repository contains the open source PHP SDK that allows you to access the [Product Advertising API](https://webservices.amazon.com/paapi5/documentation/index.html) from your PHP app.

## Installation
The Product Advertising API PHP SDK can be installed with [Composer](https://getcomposer.org/). The SDK is available via [Packagist](http://packagist.org/) under the [`amzn/paapi5-php-sdk`](https://packagist.org/packages/amzn/paapi5-php-sdk) package. If Composer is installed globally on your system, you can run the following in the base directory of your project to add the SDK as a dependency:

```sh
composer require amzn/paapi5-php-sdk
```

## Usage
> **Note:** This version of the Product Advertising API SDK for PHP requires PHP 5.5 or greater.

Simple example for [SearchItems](https://webservices.amazon.com/paapi5/documentation/search-items.html) to discover Amazon products with the keyword 'Harry Potter' in Books category:

```php
<?php
/**
 * Copyright 2019 Amazon.com, Inc. or its affiliates. All Rights Reserved.
 *
 * Licensed under the Apache License, Version 2.0 (the "License").
 * You may not use this file except in compliance with the License.
 * A copy of the License is located at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * or in the "license" file accompanying this file. This file is distributed
 * on an "AS IS" BASIS, WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either
 * express or implied. See the License for the specific language governing
 * permissions and limitations under the License.
 */

/*
 * ProductAdvertisingAPI
 *
 * https://webservices.amazon.com/paapi5/documentation/index.html
 */
 
/*
 * This sample code snippet is for ProductAdvertisingAPI 5.0's SearchItems API
 *
 * For more details, refer: https://webservices.amazon.com/paapi5/documentation/search-items.html
 */
 
use Amazon\ProductAdvertisingAPI\v1\ApiException;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\api\DefaultApi;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\PartnerType;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\ProductAdvertisingAPIClientException;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\SearchItemsRequest;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\SearchItemsResource;
use Amazon\ProductAdvertisingAPI\v1\Configuration;
 
require_once(__DIR__ . '/vendor/autoload.php'); // change path as needed
 
 
$config = new Configuration();

/*
 * Add your credentials
 */
# Please add your access key here
$config->setAccessKey('<YOUR ACCESS KEY>');
# Please add your secret key here
$config->setSecretKey('<YOUR SECRET KEY>');
 
# Please add your partner tag (store/tracking id) here
$partnerTag = '<YOUR PARTNER TAG>';
 
/*
 * PAAPI host and region to which you want to send request
 * For more details refer:
 * https://webservices.amazon.com/paapi5/documentation/common-request-parameters.html#host-and-region
 */
$config->setHost('webservices.amazon.com');
$config->setRegion('us-east-1');
 
$apiInstance = new DefaultApi(
    /*
     * If you want use custom http client, pass your client which implements `GuzzleHttp\ClientInterface`.
     * This is optional, `GuzzleHttp\Client` will be used as default.
     */
    new GuzzleHttp\Client(), $config);
 
# Request initialization
 
# Specify keywords
$keyword = 'Harry Potter';
 
/*
 * Specify the category in which search request is to be made
 * For more details, refer:
 * https://webservices.amazon.com/paapi5/documentation/use-cases/organization-of-items-on-amazon/search-index.html
 */
$searchIndex = "Books";
 
# Specify item count to be returned in search result
$itemCount = 1;
 
/*
 * Choose resources you want from SearchItemsResource enum
 * For more details, refer:
 * https://webservices.amazon.com/paapi5/documentation/search-items.html#resources-parameter
 */
$resources = [
    SearchItemsResource::ITEM_INFOTITLE,
    SearchItemsResource::OFFERSLISTINGSPRICE];
 
# Forming the request
$searchItemsRequest = new SearchItemsRequest();
$searchItemsRequest->setSearchIndex($searchIndex);
$searchItemsRequest->setKeywords($keyword);
$searchItemsRequest->setItemCount($itemCount);
$searchItemsRequest->setPartnerTag($partnerTag);
$searchItemsRequest->setPartnerType(PartnerType::ASSOCIATES);
$searchItemsRequest->setResources($resources);
 
# Validating request
$invalidPropertyList = $searchItemsRequest->listInvalidProperties();
$length = count($invalidPropertyList);
if ($length > 0) {
    echo "Error forming the request", PHP_EOL;
    foreach ($invalidPropertyList as $invalidProperty) {
        echo $invalidProperty, PHP_EOL;
    }
    return;
}

# Sending the request
try {
    $searchItemsResponse = $apiInstance->searchItems($searchItemsRequest);

    echo 'API called successfully', PHP_EOL;
    echo 'Complete Response: ', $searchItemsResponse, PHP_EOL;

    # Parsing the response
    if ($searchItemsResponse->getSearchResult() !== null) {
        echo 'Printing first item information in SearchResult:', PHP_EOL;
        $item = $searchItemsResponse->getSearchResult()->getItems()[0];
        if ($item !== null) {
            if ($item->getASIN() !== null) {
                echo "ASIN: ", $item->getASIN(), PHP_EOL;
            }
            if ($item->getDetailPageURL() !== null) {
                echo "DetailPageURL: ", $item->getDetailPageURL(), PHP_EOL;
            }
            if ($item->getItemInfo() !== null
                and $item->getItemInfo()->getTitle() !== null
                and $item->getItemInfo()->getTitle()->getDisplayValue() !== null) {
                echo "Title: ", $item->getItemInfo()->getTitle()->getDisplayValue(), PHP_EOL;
            }
            if ($item->getOffers() !== null
                and $item->getOffers() !== null
                and $item->getOffers()->getListings() !== null
                and $item->getOffers()->getListings()[0]->getPrice() !== null
                and $item->getOffers()->getListings()[0]->getPrice()->getDisplayAmount() !== null) {
                echo "Buying price: ", $item->getOffers()->getListings()[0]->getPrice()
                    ->getDisplayAmount(), PHP_EOL;
            }
        }
    }
    if ($searchItemsResponse->getErrors() !== null) {
        echo PHP_EOL, 'Printing Errors:', PHP_EOL, 'Printing first error object from list of errors', PHP_EOL;
        echo 'Error code: ', $searchItemsResponse->getErrors()[0]->getCode(), PHP_EOL;
        echo 'Error message: ', $searchItemsResponse->getErrors()[0]->getMessage(), PHP_EOL;
    }
} catch (ApiException $exception) {
    echo "Error calling PA-API 5.0!", PHP_EOL;
    echo "HTTP Status Code: ", $exception->getCode(), PHP_EOL;
    echo "Error Message: ", $exception->getMessage(), PHP_EOL;
    if ($exception->getResponseObject() instanceof ProductAdvertisingAPIClientException) {
        $errors = $exception->getResponseObject()->getErrors();
        foreach ($errors as $error) {
            echo "Error Type: ", $error->getCode(), PHP_EOL;
            echo "Error Message: ", $error->getMessage(), PHP_EOL;
        }
    } else {
        echo "Error response body: ", $exception->getResponseBody(), PHP_EOL;
    }
} catch (Exception $exception) {
    echo "Error Message: ", $exception->getMessage(), PHP_EOL;
}
?>
```

Complete documentation, installation instructions, and examples are available [here](https://webservices.amazon.com/paapi5/documentation/index.html).

## License
This SDK is distributed under the [Apache License, Version 2.0](http://www.apache.org/licenses/LICENSE-2.0), see LICENSE.txt and NOTICE.txt for more information.
