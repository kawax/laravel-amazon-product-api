<?php

/**
 * Copyright 2020 Amazon.com, Inc. or its affiliates. All Rights Reserved.
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

namespace Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1;

use \ArrayAccess;
use \Amazon\ProductAdvertisingAPI\v1\ObjectSerializer;

/**
 * OfferDeliveryInfo Class Doc Comment
 *
 * @category Class
 * @package  Amazon\ProductAdvertisingAPI\v1
 * @author   Product Advertising API team
 */
class OfferDeliveryInfo implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'OfferDeliveryInfo';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'isAmazonFulfilled' => 'bool',
        'isFreeShippingEligible' => 'bool',
        'isPrimeEligible' => 'bool',
        'shippingCharges' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferShippingCharge[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'isAmazonFulfilled' => null,
        'isFreeShippingEligible' => null,
        'isPrimeEligible' => null,
        'shippingCharges' => null
    ];

    /**
     * Array of property to type mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerTypes()
    {
        return self::$swaggerTypes;
    }

    /**
     * Array of property to format mappings. Used for (de)serialization
     *
     * @return array
     */
    public static function swaggerFormats()
    {
        return self::$swaggerFormats;
    }

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @var string[]
     */
    protected static $attributeMap = [
        'isAmazonFulfilled' => 'IsAmazonFulfilled',
        'isFreeShippingEligible' => 'IsFreeShippingEligible',
        'isPrimeEligible' => 'IsPrimeEligible',
        'shippingCharges' => 'ShippingCharges'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'isAmazonFulfilled' => 'setIsAmazonFulfilled',
        'isFreeShippingEligible' => 'setIsFreeShippingEligible',
        'isPrimeEligible' => 'setIsPrimeEligible',
        'shippingCharges' => 'setShippingCharges'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'isAmazonFulfilled' => 'getIsAmazonFulfilled',
        'isFreeShippingEligible' => 'getIsFreeShippingEligible',
        'isPrimeEligible' => 'getIsPrimeEligible',
        'shippingCharges' => 'getShippingCharges'
    ];

    /**
     * Array of attributes where the key is the local name,
     * and the value is the original name
     *
     * @return array
     */
    public static function attributeMap()
    {
        return self::$attributeMap;
    }

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @return array
     */
    public static function setters()
    {
        return self::$setters;
    }

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @return array
     */
    public static function getters()
    {
        return self::$getters;
    }

    /**
     * The original name of the model.
     *
     * @return string
     */
    public function getModelName()
    {
        return self::$swaggerModelName;
    }

    

    

    /**
     * Associative array for storing property values
     *
     * @var mixed[]
     */
    protected $container = [];

    /**
     * Constructor
     *
     * @param mixed[] $data Associated array of property values
     *                      initializing the model
     */
    public function __construct(array $data = null)
    {
        $this->container['isAmazonFulfilled'] = isset($data['isAmazonFulfilled']) ? $data['isAmazonFulfilled'] : null;
        $this->container['isFreeShippingEligible'] = isset($data['isFreeShippingEligible']) ? $data['isFreeShippingEligible'] : null;
        $this->container['isPrimeEligible'] = isset($data['isPrimeEligible']) ? $data['isPrimeEligible'] : null;
        $this->container['shippingCharges'] = isset($data['shippingCharges']) ? $data['shippingCharges'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        return $invalidProperties;
    }

    /**
     * Validate all the properties in the model
     * return true if all passed
     *
     * @return bool True if all properties are valid
     */
    public function valid()
    {
        return count($this->listInvalidProperties()) === 0;
    }


    /**
     * Gets isAmazonFulfilled
     *
     * @return bool
     */
    public function getIsAmazonFulfilled()
    {
        return $this->container['isAmazonFulfilled'];
    }

    /**
     * Sets isAmazonFulfilled
     *
     * @param bool $isAmazonFulfilled isAmazonFulfilled
     *
     * @return $this
     */
    public function setIsAmazonFulfilled($isAmazonFulfilled)
    {
        $this->container['isAmazonFulfilled'] = $isAmazonFulfilled;

        return $this;
    }

    /**
     * Gets isFreeShippingEligible
     *
     * @return bool
     */
    public function getIsFreeShippingEligible()
    {
        return $this->container['isFreeShippingEligible'];
    }

    /**
     * Sets isFreeShippingEligible
     *
     * @param bool $isFreeShippingEligible isFreeShippingEligible
     *
     * @return $this
     */
    public function setIsFreeShippingEligible($isFreeShippingEligible)
    {
        $this->container['isFreeShippingEligible'] = $isFreeShippingEligible;

        return $this;
    }

    /**
     * Gets isPrimeEligible
     *
     * @return bool
     */
    public function getIsPrimeEligible()
    {
        return $this->container['isPrimeEligible'];
    }

    /**
     * Sets isPrimeEligible
     *
     * @param bool $isPrimeEligible isPrimeEligible
     *
     * @return $this
     */
    public function setIsPrimeEligible($isPrimeEligible)
    {
        $this->container['isPrimeEligible'] = $isPrimeEligible;

        return $this;
    }

    /**
     * Gets shippingCharges
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferShippingCharge[]
     */
    public function getShippingCharges()
    {
        return $this->container['shippingCharges'];
    }

    /**
     * Sets shippingCharges
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferShippingCharge[] $shippingCharges shippingCharges
     *
     * @return $this
     */
    public function setShippingCharges($shippingCharges)
    {
        $this->container['shippingCharges'] = $shippingCharges;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset)
    {
        return isset($this->container[$offset]);
    }

    /**
     * Gets offset.
     *
     * @param integer $offset Offset
     *
     * @return mixed
     */
    public function offsetGet($offset)
    {
        return isset($this->container[$offset]) ? $this->container[$offset] : null;
    }

    /**
     * Sets value based on offset.
     *
     * @param integer $offset Offset
     * @param mixed   $value  Value to be set
     *
     * @return void
     */
    public function offsetSet($offset, $value)
    {
        if (is_null($offset)) {
            $this->container[] = $value;
        } else {
            $this->container[$offset] = $value;
        }
    }

    /**
     * Unsets offset.
     *
     * @param integer $offset Offset
     *
     * @return void
     */
    public function offsetUnset($offset)
    {
        unset($this->container[$offset]);
    }

    /**
     * Gets the string presentation of the object
     *
     * @return string
     */
    public function __toString()
    {
        if (defined('JSON_PRETTY_PRINT')) { // use JSON pretty print
            return json_encode(
                ObjectSerializer::sanitizeForSerialization($this),
                JSON_PRETTY_PRINT
            );
        }

        return json_encode(ObjectSerializer::sanitizeForSerialization($this));
    }
}


