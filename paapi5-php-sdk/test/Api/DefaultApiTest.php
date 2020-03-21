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

namespace Amazon\ProductAdvertisingAPI\v1;

use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\API\DefaultApi;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\GetBrowseNodesRequest;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\GetItemsRequest;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\GetVariationsRequest;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\SearchItemsRequest;
use GuzzleHttp;

/**
 * DefaultApiTest Class Doc Comment
 *
 * @category Class
 * @package  Amazon\ProductAdvertisingAPI\v1
 * @author   Product Advertising API team
 */
class DefaultApiTest extends \PHPUnit_Framework_TestCase
{
    const DUMMY_ACCESS_KEY = 'DUMMY_ACCESS_KEY';
    const DUMMY_SECRET_KEY = 'DUMMY_SECRET_KEY';
    const INVALID_SIGNATURE = 'InvalidSignature';
    const UNRECOGNIZED_CLIENT = 'UnrecognizedClient';
    const ANY_HOST = 'webservices.amazon.com';
    const ANY_REGION = 'us-east-1';

    /**
     * Setup before running any test cases
     */
    public static function setUpBeforeClass()
    {
    }

    /**
     * Setup before running each test case
     */
    public function setUp()
    {
    }

    /**
     * Clean up after running each test case
     */
    public function tearDown()
    {
    }

    /**
     * Clean up after running all test cases
     */
    public static function tearDownAfterClass()
    {
    }

    public function testGetBrowseNodes_InvalidSignature()
    {
        $config = new Configuration();
        $config->setHost(self::ANY_HOST);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $getBrowseNodesRequest = new GetBrowseNodesRequest();
            $apiInstance->getBrowseNodes($getBrowseNodesRequest);
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::INVALID_SIGNATURE);
        }
    }

    public function testGetBrowseNodes_UnrecognizedClient()
    {
        $config = new Configuration();
        $config->setAccessKey(self::DUMMY_ACCESS_KEY);
        $config->setSecretKey(self::DUMMY_SECRET_KEY);
        $config->setHost(self::ANY_HOST);
        $config->setRegion(self::ANY_REGION);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $getBrowseNodesRequest = new GetBrowseNodesRequest();
            $apiInstance->getBrowseNodes($getBrowseNodesRequest);
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::UNRECOGNIZED_CLIENT);
        }
    }

    public function testGetBrowseNodesWithHttpInfo_InvalidSignature()
    {
        $config = new Configuration();
        $config->setHost(self::ANY_HOST);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $getBrowseNodesRequest = new GetBrowseNodesRequest();
            $apiInstance->getBrowseNodesWithHttpInfo($getBrowseNodesRequest);
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::INVALID_SIGNATURE);
        }
    }

    public function testGetBrowseNodesWithHttpInfo_UnrecognizedClient()
    {
        $config = new Configuration();
        $config->setAccessKey(self::DUMMY_ACCESS_KEY);
        $config->setSecretKey(self::DUMMY_SECRET_KEY);
        $config->setHost(self::ANY_HOST);
        $config->setRegion(self::ANY_REGION);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $getBrowseNodesRequest = new GetBrowseNodesRequest();
            $apiInstance->getBrowseNodesWithHttpInfo($getBrowseNodesRequest);
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::UNRECOGNIZED_CLIENT);
        }
    }

    public function testGetBrowseNodesAsync_InvalidSignature()
    {
        $config = new Configuration();
        $config->setHost(self::ANY_HOST);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $getBrowseNodesRequest = new GetBrowseNodesRequest();
            $promise = $apiInstance->getBrowseNodesAsync($getBrowseNodesRequest);
            $promise->wait();
            $promise->then(
                function (\Exception $exception) {
                    throw $exception;
                }
            );
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::INVALID_SIGNATURE);
        }
    }

    public function testGetBrowseNodesAsync_UnrecognizedClient()
    {
        $config = new Configuration();
        $config->setAccessKey(self::DUMMY_SECRET_KEY);
        $config->setSecretKey(self::DUMMY_SECRET_KEY);
        $config->setHost(self::ANY_HOST);
        $config->setRegion(self::ANY_REGION);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $getBrowseNodesRequest = new GetBrowseNodesRequest();
            $promise = $apiInstance->getBrowseNodesAsync($getBrowseNodesRequest);
            $promise->wait();
            $promise->then(
                function (\Exception $exception) {
                    throw $exception;
                }
            );
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::UNRECOGNIZED_CLIENT);
        }
    }

    public function testGetBrowseNodesAsyncWithHttpInfo_InvalidSignature()
    {
        $config = new Configuration();
        $config->setHost(self::ANY_HOST);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $getBrowseNodesRequest = new GetBrowseNodesRequest();
            $promise = $apiInstance->getBrowseNodesAsyncWithHttpInfo($getBrowseNodesRequest);
            $promise->wait();
            $promise->then(
                function (\Exception $exception) {
                    throw $exception;
                }
            );
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::INVALID_SIGNATURE);
        }
    }

    public function testGetBrowseNodesAsyncWithHttpInfo_UnrecognizedClient()
    {
        $config = new Configuration();
        $config->setAccessKey(self::DUMMY_ACCESS_KEY);
        $config->setSecretKey(self::DUMMY_SECRET_KEY);
        $config->setHost(self::ANY_HOST);
        $config->setRegion(self::ANY_REGION);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $getBrowseNodesRequest = new GetBrowseNodesRequest();
            $promise = $apiInstance->getBrowseNodesAsyncWithHttpInfo($getBrowseNodesRequest);
            $promise->wait();
            $promise->then(
                function (\Exception $exception) {
                    throw $exception;
                }
            );
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::UNRECOGNIZED_CLIENT);
        }
    }

    public function testGetItems_InvalidSignature()
    {
        $config = new Configuration();
        $config->setHost(self::ANY_HOST);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $getItemsRequest = new GetItemsRequest();
            $apiInstance->getItems($getItemsRequest);
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::INVALID_SIGNATURE);
        }
    }

    public function testGetItems_UnrecognizedClient()
    {
        $config = new Configuration();
        $config->setAccessKey(self::DUMMY_ACCESS_KEY);
        $config->setSecretKey(self::DUMMY_SECRET_KEY);
        $config->setHost(self::ANY_HOST);
        $config->setRegion(self::ANY_REGION);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $getItemsRequest = new GetItemsRequest();
            $apiInstance->getItems($getItemsRequest);
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::UNRECOGNIZED_CLIENT);
        }
    }


    public function testGetItemsWithHttpInfo_InvalidSignature()
    {
        $config = new Configuration();
        $config->setHost(self::ANY_HOST);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $getItemsRequest = new GetItemsRequest();
            $apiInstance->getItemsWithHttpInfo($getItemsRequest);
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::INVALID_SIGNATURE);
        }
    }

    public function testGetItemsWithHttpInfo_UnrecognizedClient()
    {
        $config = new Configuration();
        $config->setAccessKey(self::DUMMY_ACCESS_KEY);
        $config->setSecretKey(self::DUMMY_SECRET_KEY);
        $config->setHost(self::ANY_HOST);
        $config->setRegion(self::ANY_REGION);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $getItemsRequest = new GetItemsRequest();
            $apiInstance->getItemsWithHttpInfo($getItemsRequest);
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::UNRECOGNIZED_CLIENT);
        }
    }

    public function testGetItemsAsync_InvalidSignature()
    {
        $config = new Configuration();
        $config->setHost(self::ANY_HOST);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $getItemsRequest = new GetItemsRequest();
            $promise = $apiInstance->getItemsAsync($getItemsRequest);
            $promise->wait();
            $promise->then(
                function (\Exception $exception) {
                    throw $exception;
                }
            );
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::INVALID_SIGNATURE);
        }
    }

    public function testGetItemsAsync_UnrecognizedClient()
    {
        $config = new Configuration();
        $config->setAccessKey(self::DUMMY_ACCESS_KEY);
        $config->setSecretKey(self::DUMMY_SECRET_KEY);
        $config->setHost(self::ANY_HOST);
        $config->setRegion(self::ANY_REGION);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $getItemsRequest = new GetItemsRequest();
            $promise = $apiInstance->getItemsAsync($getItemsRequest);
            $promise->wait();
            $promise->then(
                function (\Exception $exception) {
                    throw $exception;
                }
            );
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::UNRECOGNIZED_CLIENT);
        }
    }

    public function testGetItemsAsyncWithHttpInfo_InvalidSignature()
    {
        $config = new Configuration();
        $config->setHost(self::ANY_HOST);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $getItemsRequest = new GetItemsRequest();
            $promise = $apiInstance->getItemsAsyncWithHttpInfo($getItemsRequest);
            $promise->wait();
            $promise->then(
                function (\Exception $exception) {
                    throw $exception;
                }
            );
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::INVALID_SIGNATURE);
        }
    }

    public function testGetItemsAsyncWithHttpInfo_UnrecognizedClient()
    {
        $config = new Configuration();
        $config->setAccessKey(self::DUMMY_ACCESS_KEY);
        $config->setSecretKey(self::DUMMY_SECRET_KEY);
        $config->setHost(self::ANY_HOST);
        $config->setRegion(self::ANY_REGION);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $getItemsRequest = new GetItemsRequest();
            $promise = $apiInstance->getItemsAsyncWithHttpInfo($getItemsRequest);
            $promise->wait();
            $promise->then(
                function (\Exception $exception) {
                    throw $exception;
                }
            );
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::UNRECOGNIZED_CLIENT);
        }
    }


    public function testGetVariations_InvalidSignature()
    {
        $config = new Configuration();
        $config->setHost(self::ANY_HOST);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $getVariationsRequest = new GetVariationsRequest();
            $apiInstance->getVariations($getVariationsRequest);
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::INVALID_SIGNATURE);
        }
    }

    public function testGetVariations_UnrecognizedClient()
    {
        $config = new Configuration();
        $config->setAccessKey(self::DUMMY_ACCESS_KEY);
        $config->setSecretKey(self::DUMMY_SECRET_KEY);
        $config->setHost(self::ANY_HOST);
        $config->setRegion(self::ANY_REGION);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $getVariationsRequest = new GetVariationsRequest();
            $apiInstance->getVariations($getVariationsRequest);
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::UNRECOGNIZED_CLIENT);
        }
    }

    public function testGetVariationsWithHttpInfo_InvalidSignature()
    {
        $config = new Configuration();
        $config->setHost(self::ANY_HOST);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $getVariationsRequest = new GetVariationsRequest();
            $apiInstance->getVariationsWithHttpInfo($getVariationsRequest);
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::INVALID_SIGNATURE);
        }
    }

    public function testGetVariationsWithHttpInfo_UnrecognizedClient()
    {
        $config = new Configuration();
        $config->setAccessKey(self::DUMMY_ACCESS_KEY);
        $config->setSecretKey(self::DUMMY_SECRET_KEY);
        $config->setHost(self::ANY_HOST);
        $config->setRegion(self::ANY_REGION);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $getVariationsRequest = new GetVariationsRequest();
            $apiInstance->getVariationsWithHttpInfo($getVariationsRequest);
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::UNRECOGNIZED_CLIENT);
        }
    }

    public function testGetVariationsAsync_InvalidSignature()
    {
        $config = new Configuration();
        $config->setHost(self::ANY_HOST);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $getVariationsRequest = new GetVariationsRequest();
            $promise = $apiInstance->getVariationsAsync($getVariationsRequest);
            $promise->wait();
            $promise->then(
                function (\Exception $exception) {
                    throw $exception;
                }
            );
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::INVALID_SIGNATURE);
        }
    }

    public function testGetVariationsAsync_UnrecognizedClient()
    {
        $config = new Configuration();
        $config->setAccessKey(self::DUMMY_ACCESS_KEY);
        $config->setSecretKey(self::DUMMY_SECRET_KEY);
        $config->setHost(self::ANY_HOST);
        $config->setRegion(self::ANY_REGION);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $getVariationsRequest = new GetVariationsRequest();
            $promise = $apiInstance->getVariationsAsync($getVariationsRequest);
            $promise->wait();
            $promise->then(
                function (\Exception $exception) {
                    throw $exception;
                }
            );
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::UNRECOGNIZED_CLIENT);
        }
    }

    public function testGetVariationsAsyncWithHttpInfo_InvalidSignature()
    {
        $config = new Configuration();
        $config->setHost(self::ANY_HOST);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $getVariationsRequest = new GetVariationsRequest();
            $promise = $apiInstance->getVariationsAsyncWithHttpInfo($getVariationsRequest);
            $promise->wait();
            $promise->then(
                function (\Exception $exception) {
                    throw $exception;
                }
            );
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::INVALID_SIGNATURE);
        }
    }

    public function testGetVariationsAsyncWithHttpInfo_UnrecognizedClient()
    {
        $config = new Configuration();
        $config->setAccessKey(self::DUMMY_ACCESS_KEY);
        $config->setSecretKey(self::DUMMY_SECRET_KEY);
        $config->setHost(self::ANY_HOST);
        $config->setRegion(self::ANY_REGION);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $getVariationsRequest = new GetVariationsRequest();
            $promise = $apiInstance->getVariationsAsyncWithHttpInfo($getVariationsRequest);
            $promise->wait();
            $promise->then(
                function (\Exception $exception) {
                    throw $exception;
                }
            );
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::UNRECOGNIZED_CLIENT);
        }
    }

    public function testSearchItems_InvalidSignature()
    {
        $config = new Configuration();
        $config->setHost(self::ANY_HOST);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $searchItemsRequest = new SearchItemsRequest();
            $apiInstance->searchItems($searchItemsRequest);
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::INVALID_SIGNATURE);
        }
    }

    public function testSearchItems_UnrecognizedClient()
    {
        $config = new Configuration();
        $config->setAccessKey(self::DUMMY_ACCESS_KEY);
        $config->setSecretKey(self::DUMMY_SECRET_KEY);
        $config->setHost(self::ANY_HOST);
        $config->setRegion(self::ANY_REGION);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $searchItemsRequest = new SearchItemsRequest();
            $apiInstance->searchItems($searchItemsRequest);
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::UNRECOGNIZED_CLIENT);
        }
    }

    public function testSearchItemsWithHttpInfo_InvalidSignature()
    {
        $config = new Configuration();
        $config->setHost(self::ANY_HOST);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $searchItemsRequest = new SearchItemsRequest();
            $apiInstance->searchItemsWithHttpInfo($searchItemsRequest);
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::INVALID_SIGNATURE);
        }
    }

    public function testSearchItemsWithHttpInfo_UnrecognizedClient()
    {
        $config = new Configuration();
        $config->setAccessKey(self::DUMMY_ACCESS_KEY);
        $config->setSecretKey(self::DUMMY_SECRET_KEY);
        $config->setHost(self::ANY_HOST);
        $config->setRegion(self::ANY_REGION);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $searchItemsRequest = new SearchItemsRequest();
            $apiInstance->searchItemsWithHttpInfo($searchItemsRequest);
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::UNRECOGNIZED_CLIENT);
        }
    }

    public function testSearchItemsAsync_InvalidSignature()
    {
        $config = new Configuration();
        $config->setHost(self::ANY_HOST);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $searchItemsRequest = new searchItemsRequest();
            $promise = $apiInstance->searchItemsAsync($searchItemsRequest);
            $promise->wait();
            $promise->then(
                function (\Exception $exception) {
                    throw $exception;
                }
            );
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::INVALID_SIGNATURE);
        }
    }

    public function testSearchItemsAsync_UnrecognizedClient()
    {
        $config = new Configuration();
        $config->setAccessKey(self::DUMMY_ACCESS_KEY);
        $config->setSecretKey(self::DUMMY_SECRET_KEY);
        $config->setHost(self::ANY_HOST);
        $config->setRegion(self::ANY_REGION);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $searchItemsRequest = new searchItemsRequest();
            $promise = $apiInstance->searchItemsAsync($searchItemsRequest);
            $promise->wait();
            $promise->then(
                function (\Exception $exception) {
                    throw $exception;
                }
            );
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::UNRECOGNIZED_CLIENT);
        }
    }

    public function testSearchItemsAsyncWithHttpInfo_InvalidSignature()
    {
        $config = new Configuration();
        $config->setHost(self::ANY_HOST);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $searchItemsRequest = new searchItemsRequest();
            $promise = $apiInstance->searchItemsAsyncWithHttpInfo($searchItemsRequest);
            $promise->wait();
            $promise->then(
                function (\Exception $exception) {
                    throw $exception;
                }
            );
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::INVALID_SIGNATURE);
        }
    }

    public function testSearchItemsAsyncWithHttpInfo_UnrecognizedClient()
    {
        $config = new Configuration();
        $config->setAccessKey(self::DUMMY_ACCESS_KEY);
        $config->setSecretKey(self::DUMMY_SECRET_KEY);
        $config->setHost(self::ANY_HOST);
        $config->setRegion(self::ANY_REGION);
        $apiInstance = new DefaultApi(new GuzzleHttp\Client(), $config);
        try {
            $searchItemsRequest = new searchItemsRequest();
            $promise = $apiInstance->searchItemsAsyncWithHttpInfo($searchItemsRequest);
            $promise->wait();
            $promise->then(
                function (\Exception $exception) {
                    throw $exception;
                }
            );
        } catch (ApiException $exception) {
            assert($exception->getCode() === 401);
            assert($exception->getResponseObject()->getErrors()[0]->getCode() === self::UNRECOGNIZED_CLIENT);
        }
    }
}
