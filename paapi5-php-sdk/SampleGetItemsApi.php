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
 * This sample code snippet is for ProductAdvertisingAPI 5.0's GetItems API
 *
 * For more details, refer: https://webservices.amazon.com/paapi5/documentation/get-items.html
 */

use Amazon\ProductAdvertisingAPI\v1\ApiException;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\api\DefaultApi;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\GetItemsRequest;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\GetItemsResource;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\PartnerType;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\ProductAdvertisingAPIClientException;
use Amazon\ProductAdvertisingAPI\v1\Configuration;

require_once(__DIR__ . '/vendor/autoload.php'); // change path as needed

/**
 * Returns the array of items mapped to ASIN
 *
 * @param array $items Items value.
 * @return array of \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\Item mapped to ASIN.
 */
function parseResponse($items)
{
    $mappedResponse = [];
    foreach ($items as $item) {
        $mappedResponse[$item->getASIN()] = $item;
    }
    return $mappedResponse;
}

function getItems()
{
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
        new GuzzleHttp\Client(),
        $config
    );

    # Request initialization

    # Choose item id(s)
    $itemIds = ["059035342X", "B00X4WHP55", "1401263119"];

    /*
     * Choose resources you want from GetItemsResource enum
     * For more details, refer: https://webservices.amazon.com/paapi5/documentation/get-items.html#resources-parameter
     */
    $resources = [
        GetItemsResource::ITEM_INFOTITLE,
        GetItemsResource::OFFERSLISTINGSPRICE];

    # Forming the request
    $getItemsRequest = new GetItemsRequest();
    $getItemsRequest->setItemIds($itemIds);
    $getItemsRequest->setPartnerTag($partnerTag);
    $getItemsRequest->setPartnerType(PartnerType::ASSOCIATES);
    $getItemsRequest->setResources($resources);

    # Validating request
    $invalidPropertyList = $getItemsRequest->listInvalidProperties();
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
        $getItemsResponse = $apiInstance->getItems($getItemsRequest);

        echo 'API called successfully', PHP_EOL;
        echo 'Complete Response: ', $getItemsResponse, PHP_EOL;

        # Parsing the response
        if ($getItemsResponse->getItemsResult() !== null) {
            echo 'Printing all item information in ItemsResult:', PHP_EOL;
            if ($getItemsResponse->getItemsResult()->getItems() !== null) {
                $responseList = parseResponse($getItemsResponse->getItemsResult()->getItems());

                foreach ($itemIds as $itemId) {
                    echo 'Printing information about the itemId: ', $itemId, PHP_EOL;
                    $item = $responseList[$itemId];
                    if ($item !== null) {
                        if ($item->getASIN()) {
                            echo 'ASIN: ', $item->getASIN(), PHP_EOL;
                        }
                        if ($item->getItemInfo() !== null and $item->getItemInfo()->getTitle() !== null
                            and $item->getItemInfo()->getTitle()->getDisplayValue() !== null) {
                            echo 'Title: ', $item->getItemInfo()->getTitle()->getDisplayValue(), PHP_EOL;
                        }
                        if ($item->getDetailPageURL() !== null) {
                            echo 'Detail Page URL: ', $item->getDetailPageURL(), PHP_EOL;
                        }
                        if ($item->getOffers() !== null and
                            $item->getOffers()->getListings() !== null
                            and $item->getOffers()->getListings()[0]->getPrice() !== null
                            and $item->getOffers()->getListings()[0]->getPrice()->getDisplayAmount() !== null) {
                            echo 'Buying price: ', $item->getOffers()->getListings()[0]->getPrice()
                                ->getDisplayAmount(), PHP_EOL;
                        }
                    } else {
                        echo "Item not found, check errors", PHP_EOL;
                    }
                }
            }
        }
        if ($getItemsResponse->getErrors() !== null) {
            echo PHP_EOL, 'Printing Errors:', PHP_EOL, 'Printing first error object from list of errors', PHP_EOL;
            echo 'Error code: ', $getItemsResponse->getErrors()[0]->getCode(), PHP_EOL;
            echo 'Error message: ', $getItemsResponse->getErrors()[0]->getMessage(), PHP_EOL;
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
}

function getItemsWithHttpInfo()
{
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
        new GuzzleHttp\Client(),
        $config
    );

    # Request initialization

    # Choose item id(s)
    $itemIds = ["059035342X", "B00X4WHP55", "1401263119"];

    /*
     * Choose resources you want from GetItemsResource enum
     * For more details, refer: https://webservices.amazon.com/paapi5/documentation/get-items.html#resources-parameter
     */
    $resources = [
        GetItemsResource::ITEM_INFOTITLE,
        GetItemsResource::OFFERSLISTINGSPRICE];

    # Forming the request
    $getItemsRequest = new GetItemsRequest();
    $getItemsRequest->setItemIds($itemIds);
    $getItemsRequest->setPartnerTag($partnerTag);
    $getItemsRequest->setPartnerType(PartnerType::ASSOCIATES);
    $getItemsRequest->setResources($resources);

    # Validating request
    $invalidPropertyList = $getItemsRequest->listInvalidProperties();
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
        $responseWithHttpInfo = $apiInstance->getItemsWithHttpInfo($getItemsRequest);

        echo 'API called successfully', PHP_EOL;
        echo 'Complete Response dump: ';
        var_dump($responseWithHttpInfo);
        echo "HTTP Info: ";
        var_dump($responseWithHttpInfo[2]);

        # Parsing the response
        $response = $responseWithHttpInfo[0];
        if ($response->getItemsResult() !== null) {
            echo 'Printing all item information in ItemResult:', PHP_EOL;
            if ($response->getItemsResult()->getItems() !== null) {
                $responseList = parseResponse($response->getItemsResult()->getItems());

                foreach ($itemIds as $itemId) {
                    echo 'Printing information about the itemId: ', $itemId, PHP_EOL;
                    $item = $responseList[$itemId];
                    if ($item !== null) {
                        if ($item->getASIN()) {
                            echo 'ASIN: ', $item->getASIN(), PHP_EOL;
                        }
                        if ($item->getItemInfo() !== null and $item->getItemInfo()->getTitle() !== null
                            and $item->getItemInfo()->getTitle()->getDisplayValue() !== null) {
                            echo 'Title: ', $item->getItemInfo()->getTitle()->getDisplayValue(), PHP_EOL;
                        }
                        if ($item->getDetailPageURL() !== null) {
                            echo 'Detail Page URL: ', $item->getDetailPageURL(), PHP_EOL;
                        }
                        if ($item->getOffers() !== null and $item->getOffers()->getListings() !== null
                            and $item->getOffers()->getListings()[0]->getPrice() !== null
                            and $item->getOffers()->getListings()[0]->getPrice()->getDisplayAmount() !== null) {
                            echo 'Buying price: ', $item->getOffers()->getListings()[0]->getPrice()
                                ->getDisplayAmount(), PHP_EOL;
                        }
                    } else {
                        echo "Item not found, check errors", PHP_EOL;
                    }
                }
            }
        }
        if ($response->getErrors() !== null) {
            echo PHP_EOL, 'Printing Errors:', PHP_EOL, 'Printing first error object from list of errors', PHP_EOL;
            echo 'Error code: ', $response->getErrors()[0]->getCode(), PHP_EOL;
            echo 'Error message: ', $response->getErrors()[0]->getMessage(), PHP_EOL;
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
}

function getItemsAsync()
{
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
        new GuzzleHttp\Client(),
        $config
    );

    # Request initialization

    # Choose item id(s)
    $itemIds = ["059035342X", "B00X4WHP55", "1401263119"];

    /*
     * Choose resources you want from GetItemsResource enum
     * For more details, refer: https://webservices.amazon.com/paapi5/documentation/get-items.html#resources-parameter
     */
    $resources = [
        GetItemsResource::ITEM_INFOTITLE,
        GetItemsResource::OFFERSLISTINGSPRICE];

    # Forming the request
    $getItemsRequest = new GetItemsRequest();
    $getItemsRequest->setItemIds($itemIds);
    $getItemsRequest->setPartnerTag($partnerTag);
    $getItemsRequest->setPartnerType(PartnerType::ASSOCIATES);
    $getItemsRequest->setResources($resources);

    # Validating request
    $invalidPropertyList = $getItemsRequest->listInvalidProperties();
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
        $promise = $apiInstance->getItemsAsync($getItemsRequest);
        $response = $promise->wait();
        $promise->then(
            function ($response) {
                return $response;
            },
            function (\Exception $exception) {
                echo "Error Message: ", $exception->getMessage(), PHP_EOL;
                throw $exception;
            }
        );

        echo 'API called successfully', PHP_EOL;
        echo 'Complete Response: ', $response, PHP_EOL;

        # Parsing the response
        if ($response->getItemsResult() !== null) {
            echo 'Printing all item information in ItemResult:', PHP_EOL;
            if ($response->getItemsResult()->getItems() !== null) {
                $responseList = parseResponse($response->getItemsResult()->getItems());

                foreach ($itemIds as $itemId) {
                    echo 'Printing information about the itemId: ', $itemId, PHP_EOL;
                    $item = $responseList[$itemId];
                    if ($item !== null) {
                        if ($item->getASIN()) {
                            echo 'ASIN: ', $item->getASIN(), PHP_EOL;
                        }
                        if ($item->getItemInfo() !== null and $item->getItemInfo()->getTitle() !== null
                            and $item->getItemInfo()->getTitle()->getDisplayValue() !== null) {
                            echo 'Title: ', $item->getItemInfo()->getTitle()->getDisplayValue(), PHP_EOL;
                        }
                        if ($item->getDetailPageURL() !== null) {
                            echo 'Detail Page URL: ', $item->getDetailPageURL(), PHP_EOL;
                        }
                        if ($item->getOffers() !== null and $item->getOffers()->getListings() !== null
                            and $item->getOffers()->getListings()[0]->getPrice() !== null
                            and $item->getOffers()->getListings()[0]->getPrice()->getDisplayAmount() !== null) {
                            echo 'Buying price: ', $item->getOffers()->getListings()[0]->getPrice()
                                ->getDisplayAmount(), PHP_EOL;
                        }
                    } else {
                        echo "Item not found, check errors", PHP_EOL;
                    }
                }
            }
        }
        if ($response->getErrors() !== null) {
            echo PHP_EOL, 'Printing Errors:', PHP_EOL, 'Printing first error object from list of errors', PHP_EOL;
            echo 'Error code: ', $response->getErrors()[0]->getCode(), PHP_EOL;
            echo 'Error message: ', $response->getErrors()[0]->getMessage(), PHP_EOL;
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
}

function getItemsAsyncWithHttpInfo()
{
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
        new GuzzleHttp\Client(),
        $config
    );

    # Request initialization

    # Choose item id(s)
    $itemIds = ["059035342X", "B00X4WHP55", "1401263119"];

    /*
     * Choose resources you want from GetItemsResource enum
     * For more details, refer: https://webservices.amazon.com/paapi5/documentation/get-items.html#resources-parameter
     */
    $resources = [
        GetItemsResource::ITEM_INFOTITLE,
        GetItemsResource::OFFERSLISTINGSPRICE];

    # Forming the request
    $getItemsRequest = new GetItemsRequest();
    $getItemsRequest->setItemIds($itemIds);
    $getItemsRequest->setPartnerTag($partnerTag);
    $getItemsRequest->setPartnerType(PartnerType::ASSOCIATES);
    $getItemsRequest->setResources($resources);

    # Validating request
    $invalidPropertyList = $getItemsRequest->listInvalidProperties();
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
        $promise = $apiInstance->getItemsAsyncWithHttpInfo($getItemsRequest);
        $responseWithHttpInfo = $promise->wait();
        $promise->then(
            function ($response) {
                return $response;
            },
            function (\Exception $exception) {
                echo "Error Message: ", $exception->getMessage(), PHP_EOL;
                throw $exception;
            }
        );

        echo 'API called successfully', PHP_EOL;
        echo 'Complete Response dump: ';
        var_dump($responseWithHttpInfo);
        echo "HTTP Info: ";
        var_dump($responseWithHttpInfo[2]);

        # Parsing the response
        $response = $responseWithHttpInfo[0];
        if ($response->getItemsResult() !== null) {
            echo 'Printing all item information in ItemResult:', PHP_EOL;
            if ($response->getItemsResult()->getItems() !== null) {
                $responseList = parseResponse($response->getItemsResult()->getItems());

                foreach ($itemIds as $itemId) {
                    echo 'Printing information about the itemId: ', $itemId, PHP_EOL;
                    $item = $responseList[$itemId];
                    if ($item !== null) {
                        if ($item->getASIN()) {
                            echo 'ASIN: ', $item->getASIN(), PHP_EOL;
                        }
                        if ($item->getItemInfo() !== null and $item->getItemInfo()->getTitle() !== null
                            and $item->getItemInfo()->getTitle()->getDisplayValue() !== null) {
                            echo 'Title: ', $item->getItemInfo()->getTitle()->getDisplayValue(), PHP_EOL;
                        }
                        if ($item->getDetailPageURL() !== null) {
                            echo 'Detail Page URL: ', $item->getDetailPageURL(), PHP_EOL;
                        }
                        if ($item->getOffers() !== null and $item->getOffers()->getListings() !== null
                            and $item->getOffers()->getListings()[0]->getPrice() !== null
                            and $item->getOffers()->getListings()[0]->getPrice()->getDisplayAmount() !== null) {
                            echo 'Buying price: ', $item->getOffers()->getListings()[0]->getPrice()
                                ->getDisplayAmount(), PHP_EOL;
                        }
                    } else {
                        echo "Item not found, check errors", PHP_EOL;
                    }
                }
            }
        }
        if ($response->getErrors() !== null) {
            echo PHP_EOL, 'Printing Errors:', PHP_EOL, 'Printing first error object from list of errors', PHP_EOL;
            echo 'Error code: ', $response->getErrors()[0]->getCode(), PHP_EOL;
            echo 'Error message: ', $response->getErrors()[0]->getMessage(), PHP_EOL;
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
}

getItems();
#getItemsWithHttpInfo();
#getItemsAsync();
#getItemsAsyncWithHttpInfo();
