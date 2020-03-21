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
 * This sample code snippet is for ProductAdvertisingAPI 5.0's GetBrowseNodes API
 *
 * For more details, refer: https://webservices.amazon.com/paapi5/documentation/getbrowsenodes.html
 */

use Amazon\ProductAdvertisingAPI\v1\ApiException;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\api\DefaultApi;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\GetBrowseNodesRequest;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\GetBrowseNodesResource;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\PartnerType;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\ProductAdvertisingAPIClientException;
use Amazon\ProductAdvertisingAPI\v1\Configuration;

require_once(__DIR__ . '/vendor/autoload.php'); // change path as needed

/**
 * Returns the array of Browse Nodes mapped to Browse Node id
 *
 * @param array $browseNodes Browse nodes value.
 * @return array of \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\BrowseNode mapped to Browse Node id.
 */
function parseResponse($browseNodes)
{
    $mappedResponse = [];
    foreach ($browseNodes as $browseNode) {
        $mappedResponse[$browseNode->getId()] = $browseNode;
    }
    return $mappedResponse;
}

function getBrowseNodes()
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

    # Specify browseNode id(s)
    $browseNodeIds = ["3040", "0", "3045"];

    /*
     * Choose resources you want from GetItemsResource enum
     * For more details,
     * refer: https://webservices.amazon.com/paapi5/documentation/getbrowsenodes.html#resources-parameter
     */
    $resources = [
        GetBrowseNodesResource::ANCESTOR,
        GetBrowseNodesResource::CHILDREN];

    # Forming the request
    $getBrowseNodesRequest = new GetBrowseNodesRequest();
    $getBrowseNodesRequest->setBrowseNodeIds($browseNodeIds);
    $getBrowseNodesRequest->setPartnerTag($partnerTag);
    $getBrowseNodesRequest->setPartnerType(PartnerType::ASSOCIATES);
    $getBrowseNodesRequest->setResources($resources);

    # Validating request
    $invalidPropertyList = $getBrowseNodesRequest->listInvalidProperties();
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
        $getBrowseNodesResponse = $apiInstance->getBrowseNodes($getBrowseNodesRequest);
        echo "API called successfully", PHP_EOL;
        echo "Complete response: ", $getBrowseNodesResponse, PHP_EOL;

        # Parsing the response
        if ($getBrowseNodesResponse->getBrowseNodesResult() !== null) {
            echo 'Printing all browse node information in BrowseNodesResult:', PHP_EOL;
            if ($getBrowseNodesResponse->getBrowseNodesResult()->getBrowseNodes() !== null) {
                $responseList = parseResponse($getBrowseNodesResponse->getBrowseNodesResult()->getBrowseNodes());
                foreach ($browseNodeIds as $browseNodeId) {
                    echo "Printing information about the browse node with Id: ", $browseNodeId, PHP_EOL;
                    if ($responseList[$browseNodeId] !== null) {
                        $browseNode = $responseList[$browseNodeId];
                        if ($browseNode->getId() !== null) {
                            echo 'BrowseNode Id: ', $browseNode->getId(), PHP_EOL;
                        }
                        if ($browseNode->getDisplayName() !== null) {
                            echo 'DisplayName: ', $browseNode->getDisplayName(), PHP_EOL;
                        }
                        if ($browseNode->getContextFreeName() !== null) {
                            echo 'ContextFreeName: ', $browseNode->getContextFreeName(), PHP_EOL;
                        }
                    } else {
                        echo "BrowseNode not found, check errors", PHP_EOL;
                    }
                }
            }
        }
        if ($getBrowseNodesResponse->getErrors() !== null) {
            echo PHP_EOL, 'Printing Errors:', PHP_EOL, 'Printing first error object from list of errors', PHP_EOL;
            echo 'Error code: ', $getBrowseNodesResponse->getErrors()[0]->getCode(), PHP_EOL;
            echo 'Error message: ', $getBrowseNodesResponse->getErrors()[0]->getMessage(), PHP_EOL;
        }
    } catch (ApiException $exception) {
        echo "Error calling PA-API 5.0!", PHP_EOL;
        echo "HTTP Status Code: ", $exception->getCode(), PHP_EOL;
        echo "Error Message: ", $exception->getMessage(), PHP_EOL;
        echo "Request ID: ", $exception->getResponseHeaders()['x-amzn-RequestId'][0], PHP_EOL;
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

function getBrowseNodesWithHttpInfo()
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

    # Specify browseNode id(s)
    $browseNodeIds = ["3040", "0", "3045"];

    /*
     * Choose resources you want from GetItemsResource enum
     * For more details,
     * refer: https://webservices.amazon.com/paapi5/documentation/getbrowsenodes.html#resources-parameter
     */
    $resources = [
        GetBrowseNodesResource::ANCESTOR,
        GetBrowseNodesResource::CHILDREN];

    # Forming the request
    $getBrowseNodesRequest = new GetBrowseNodesRequest();
    $getBrowseNodesRequest->setBrowseNodeIds($browseNodeIds);
    $getBrowseNodesRequest->setPartnerTag($partnerTag);
    $getBrowseNodesRequest->setPartnerType(PartnerType::ASSOCIATES);
    $getBrowseNodesRequest->setResources($resources);

    # Validating request
    $invalidPropertyList = $getBrowseNodesRequest->listInvalidProperties();
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
        $browseNodesWithHttpInfo = $apiInstance->getBrowseNodesWithHttpInfo($getBrowseNodesRequest);

        echo "API called successfully", PHP_EOL;
        echo "Complete response dump: ";
        var_dump($browseNodesWithHttpInfo);
        echo PHP_EOL, "HTTP Info: ";
        var_dump($browseNodesWithHttpInfo[2]);

        # Parsing the response
        $response = $browseNodesWithHttpInfo[0];
        if ($response->getBrowseNodesResult() !== null) {
            echo 'Printing all browse node information in BrowseNodesResult:', PHP_EOL;
            if ($response->getBrowseNodesResult()->getBrowseNodes() !== null) {
                $responseList = parseResponse($response->getBrowseNodesResult()->getBrowseNodes());
                foreach ($browseNodeIds as $browseNodeId) {
                    echo "Printing information about the browse node with Id: ", $browseNodeId, PHP_EOL;
                    if ($responseList[$browseNodeId] !== null) {
                        $browseNode = $responseList[$browseNodeId];
                        if ($browseNode->getId() !== null) {
                            echo 'BrowseNode Id: ', $browseNode->getId(), PHP_EOL;
                        }
                        if ($browseNode->getDisplayName() !== null) {
                            echo 'DisplayName: ', $browseNode->getDisplayName(), PHP_EOL;
                        }
                        if ($browseNode->getContextFreeName() !== null) {
                            echo 'ContextFreeName: ', $browseNode->getContextFreeName(), PHP_EOL;
                        }
                    } else {
                        echo "BrowseNode not found, check errors", PHP_EOL;
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
        echo "Request ID: ", $exception->getResponseHeaders()['x-amzn-RequestId'][0], PHP_EOL;
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

function getBrowseNodesAsync()
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

    # Specify browseNode id(s)
    $browseNodeIds = ["3040", "0", "3045"];

    /*
     * Choose resources you want from GetItemsResource enum
     * For more details,
     * refer: https://webservices.amazon.com/paapi5/documentation/getbrowsenodes.html#resources-parameter
     */
    $resources = [
        GetBrowseNodesResource::ANCESTOR,
        GetBrowseNodesResource::CHILDREN];

    # Forming the request
    $getBrowseNodesRequest = new GetBrowseNodesRequest();
    $getBrowseNodesRequest->setBrowseNodeIds($browseNodeIds);
    $getBrowseNodesRequest->setPartnerTag($partnerTag);
    $getBrowseNodesRequest->setPartnerType(PartnerType::ASSOCIATES);
    $getBrowseNodesRequest->setResources($resources);

    # Validating request
    $invalidPropertyList = $getBrowseNodesRequest->listInvalidProperties();
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
        $promise = $apiInstance->getBrowseNodesAsync($getBrowseNodesRequest);
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

        echo "API called successfully", PHP_EOL;
        echo "Complete response: ", $response, PHP_EOL;

        # Parsing the response
        if ($response->getBrowseNodesResult() !== null) {
            echo 'Printing all browse node information in BrowseNodesResult:', PHP_EOL;
            if ($response->getBrowseNodesResult()->getBrowseNodes() !== null) {
                $responseList = parseResponse($response->getBrowseNodesResult()->getBrowseNodes());
                foreach ($browseNodeIds as $browseNodeId) {
                    echo "Printing information about the browse node with Id: ", $browseNodeId, PHP_EOL;
                    if ($responseList[$browseNodeId] !== null) {
                        $browseNode = $responseList[$browseNodeId];
                        if ($browseNode->getId() !== null) {
                            echo 'BrowseNode Id: ', $browseNode->getId(), PHP_EOL;
                        }
                        if ($browseNode->getDisplayName() !== null) {
                            echo 'DisplayName: ', $browseNode->getDisplayName(), PHP_EOL;
                        }
                        if ($browseNode->getContextFreeName() !== null) {
                            echo 'ContextFreeName: ', $browseNode->getContextFreeName(), PHP_EOL;
                        }
                    } else {
                        echo "BrowseNode not found, check errors", PHP_EOL;
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
        echo "Request ID: ", $exception->getResponseHeaders()['x-amzn-RequestId'][0], PHP_EOL;
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

function getBrowseNodesAsyncWithHttpInfo()
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

    # Specify browseNode id(s)
    $browseNodeIds = ["3040", "0", "3045"];

    /*
     * Choose resources you want from GetItemsResource enum
     * For more details,
     * refer: https://webservices.amazon.com/paapi5/documentation/getbrowsenodes.html#resources-parameter
     */
    $resources = [
        GetBrowseNodesResource::ANCESTOR,
        GetBrowseNodesResource::CHILDREN];

    # Forming the request
    $getBrowseNodesRequest = new GetBrowseNodesRequest();
    $getBrowseNodesRequest->setBrowseNodeIds($browseNodeIds);
    $getBrowseNodesRequest->setPartnerTag($partnerTag);
    $getBrowseNodesRequest->setPartnerType(PartnerType::ASSOCIATES);
    $getBrowseNodesRequest->setResources($resources);

    # Validating request
    $invalidPropertyList = $getBrowseNodesRequest->listInvalidProperties();
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
        $promise = $apiInstance->getBrowseNodesAsyncWithHttpInfo($getBrowseNodesRequest);
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

        echo "API called successfully", PHP_EOL;
        echo "Complete response dump: ";
        var_dump($responseWithHttpInfo);
        echo "HTTP Info: ";
        var_dump($responseWithHttpInfo[2]);

        # Parsing the response
        $response = $responseWithHttpInfo[0];
        if ($response->getBrowseNodesResult() !== null) {
            echo 'Printing all browse node information in BrowseNodesResult:', PHP_EOL;
            if ($response->getBrowseNodesResult()->getBrowseNodes() !== null) {
                $responseList = parseResponse($response->getBrowseNodesResult()->getBrowseNodes());
                foreach ($browseNodeIds as $browseNodeId) {
                    echo "Printing information about the browse node with Id: ", $browseNodeId, PHP_EOL;
                    if ($responseList[$browseNodeId] !== null) {
                        $browseNode = $responseList[$browseNodeId];
                        if ($browseNode->getId() !== null) {
                            echo 'BrowseNode Id: ', $browseNode->getId(), PHP_EOL;
                        }
                        if ($browseNode->getDisplayName() !== null) {
                            echo 'DisplayName: ', $browseNode->getDisplayName(), PHP_EOL;
                        }
                        if ($browseNode->getContextFreeName() !== null) {
                            echo 'ContextFreeName: ', $browseNode->getContextFreeName(), PHP_EOL;
                        }
                    } else {
                        echo "BrowseNode not found, check errors", PHP_EOL;
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
        echo "Request ID: ", $exception->getResponseHeaders()['x-amzn-RequestId'][0], PHP_EOL;
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

getBrowseNodes();
#getBrowseNodesWithHttpInfo();
#getBrowseNodesAsync();
#getBrowseNodesAsyncWithHttpInfo();
