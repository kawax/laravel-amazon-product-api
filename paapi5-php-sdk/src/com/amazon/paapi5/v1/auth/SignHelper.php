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

namespace Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\auth;

/**
 * SignHelper Class Doc Comment
 *
 * @category Class
 * @package  Amazon\ProductAdvertisingAPI\v1
 * @author   Product Advertising API team
 */
class SignHelper
{
    private $host = null;
    private $accessKey = null;
    private $secretKey = null;
    private $region = null;
    private $resourcePath = null;
    private $operation = null;
    private $awsHeaders = [];
    private $payload = '';

    private $service = 'ProductAdvertisingAPI';
    private $httpMethod = 'POST';
    private $HMACAlgorithm = 'AWS4-HMAC-SHA256';
    private $aws4Request = 'aws4_request';
    private $strSignedHeader = null;
    private $xAmzDate = null;
    private $currentDate = null;

    /**
     * @param object $config
     * @param string $payload
     * @param string $resourcePath
     * @param string operation
     */
    public function __construct($config, $payload, $resourcePath, $operation)
    {
        $this->config = $config;
        $this->payload = $payload;
        $this->resourcePath = $resourcePath;
        $this->operation = $operation;

        $this->host = parse_url($config->getHost(), PHP_URL_HOST);
        $this->accessKey = $config->getAccessKey();
        $this->secretKey = $config->getSecretKey();
        $this->region = $config->getRegion();

        /* Get current timestamp value.(UTC) */
        $this->xAmzDate = $this->getTimeStamp();
        $this->currentDate = $this->getDate();
    }

    private function prepareCanonicalRequest()
    {
        $canonicalURL = '';

        /* Start with the HTTP request method (GET, PUT, POST, etc.), followed by a newline character. */
        $canonicalURL .= $this->httpMethod . "\n";

        /* Add the canonical URI parameter, followed by a newline character. */
        $canonicalURL .= $this->resourcePath . "\n" . "\n";

        /* Add the canonical headers, followed by a newline character. */
        $signedHeaders = '';
        foreach ($this->awsHeaders as $key => $value) {
            $signedHeaders .=  strtolower($key) . ';';
            $canonicalURL .= strtolower($key) . ':' . $value . "\n";
        }

        $canonicalURL .= "\n";

        /* Add the signed headers, followed by a newline character. */
        $this->strSignedHeader = substr($signedHeaders, 0, -1);
        $canonicalURL .= $this->strSignedHeader . "\n";

        /* Use a hash (digest) function like SHA256 to create a hashed value from the payload
         * in the body of the HTTP or HTTPS.
         */
        $canonicalURL .= $this->generateHex($this->payload);

        return $canonicalURL;
    }

    private function prepareStringToSign($canonicalURL)
    {
        $stringToSign = '';

        /* Add algorithm designation, followed by a newline character. */
        $stringToSign .= $this->HMACAlgorithm . "\n";

        /* Append the request date value, followed by a newline character. */
        $stringToSign .= $this->xAmzDate . "\n";

        /* Append the credential scope value, followed by a newline character. */
        $stringToSign .= $this->currentDate . '/' . $this->region . '/' . $this->service . '/' . $this->aws4Request . "\n";
        /* Append the hash of the canonical request */
        $stringToSign .= $this->generateHex($canonicalURL);

        return $stringToSign;
    }

    private function calculateSignature($stringToSign)
    {
        /* Derive signing key */
        $signatureKey = $this->getSignatureKey($this->secretKey, $this->currentDate, $this->region, $this->service);

        /* Calculate the signature. */
        $signature = hash_hmac('sha256', $stringToSign, $signatureKey, true);

        /* Encode signature (byte[]) to Hex */
        $strHexSignature = strtolower(bin2hex($signature));

        return $strHexSignature;
    }

    /**
     * Function used to create and return authorization header
     * @return array authorization header
     */
    public function getHeaders()
    {
        $this->awsHeaders['Content-Encoding'] = 'amz-1.0';
        $this->awsHeaders['Content-Type'] = 'application/json';
        $this->awsHeaders['Host'] = $this->host;
        $this->awsHeaders['X-Amz-Date'] = $this->xAmzDate;
        $this->awsHeaders['X-Amz-Target'] = $this->buildAmzTarget();

        /* Sort headers */
        ksort($this->awsHeaders);

        /* Create a Canonical Request for Signature Version 4. */
        $canonicalURL = $this->prepareCanonicalRequest();

        /* Create a String to Sign for Signature Version 4. */
        $stringToSign = $this->prepareStringToSign($canonicalURL);

        /* Calculate the AWS Signature Version 4. */
        $signature = $this->calculateSignature($stringToSign);
        if ($signature) {
            $this->awsHeaders['Authorization'] = $this->buildAuthorizationString($signature);
        }
        return $this->awsHeaders;
    }

    /**
     * Build Amz target for X-Amz-Target header
     * @return string Amz target
     */
    private function buildAmzTarget()
    {
        return 'com.amazon.paapi5.v1.ProductAdvertisingAPIv1.' . $this->operation;
    }

    /**
     * Build string for Authorization header.
     * @param string strSignature
     * @return string authorization string
     */
    private function buildAuthorizationString($strSignature)
    {
        return $this->HMACAlgorithm . ' ' . 'Credential=' . $this->accessKey . '/' . $this->getDate() . '/' . $this->region . '/' . $this->service . '/' . $this->aws4Request . ',' . 'SignedHeaders=' . $this->strSignedHeader . ',' . 'Signature=' . $strSignature;
    }

    /**
     * Generate Hex code of String.
     * @param string data
     * @return string hex code
     */
    private function generateHex($data)
    {
        return hash('sha256', $data);
    }

    /**
     * Function to generate AWS signature key.
     * @param string key
     * @param string date
     * @param string region
     * @param string service
     * @return string signature key
     * @reference - http://docs.aws.amazon.com/general/latest/gr/signature-v4-examples.html#signature-v4-examples-java
     */
    private function getSignatureKey($key, $date, $region, $service)
    {
        $kSecret  = 'AWS4' . $key;
        $kDate    = hash_hmac('sha256', $date, $kSecret, true);
        $kRegion  = hash_hmac('sha256', $region, $kDate, true);
        $kService = hash_hmac('sha256', $service, $kRegion, true);
        $kSigning = hash_hmac('sha256', $this->aws4Request, $kService, true);

        return $kSigning;
    }

    /**
     * Get timestamp. yyyyMMdd'T'HHmmss'Z'
     * @return string timestamp in required format
     */
    private function getTimeStamp()
    {
        return gmdate('Ymd\THis\Z');
    }

    /**
     * Get date. yyyyMMdd
     * @return object GMT date
     */
    private function getDate()
    {
        return gmdate('Ymd');
    }
}
