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
 * OfferSummary Class Doc Comment
 *
 * @category Class
 * @package  Amazon\ProductAdvertisingAPI\v1
 * @author   Product Advertising API team
 */
class OfferSummary implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'OfferSummary';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'condition' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferCondition',
        'highestPrice' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferPrice',
        'lowestPrice' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferPrice',
        'offerCount' => 'int'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'condition' => null,
        'highestPrice' => null,
        'lowestPrice' => null,
        'offerCount' => 'int32'
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
        'condition' => 'Condition',
        'highestPrice' => 'HighestPrice',
        'lowestPrice' => 'LowestPrice',
        'offerCount' => 'OfferCount'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'condition' => 'setCondition',
        'highestPrice' => 'setHighestPrice',
        'lowestPrice' => 'setLowestPrice',
        'offerCount' => 'setOfferCount'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'condition' => 'getCondition',
        'highestPrice' => 'getHighestPrice',
        'lowestPrice' => 'getLowestPrice',
        'offerCount' => 'getOfferCount'
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
        $this->container['condition'] = isset($data['condition']) ? $data['condition'] : null;
        $this->container['highestPrice'] = isset($data['highestPrice']) ? $data['highestPrice'] : null;
        $this->container['lowestPrice'] = isset($data['lowestPrice']) ? $data['lowestPrice'] : null;
        $this->container['offerCount'] = isset($data['offerCount']) ? $data['offerCount'] : null;
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
     * Gets condition
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferCondition
     */
    public function getCondition()
    {
        return $this->container['condition'];
    }

    /**
     * Sets condition
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferCondition $condition condition
     *
     * @return $this
     */
    public function setCondition($condition)
    {
        $this->container['condition'] = $condition;

        return $this;
    }

    /**
     * Gets highestPrice
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferPrice
     */
    public function getHighestPrice()
    {
        return $this->container['highestPrice'];
    }

    /**
     * Sets highestPrice
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferPrice $highestPrice highestPrice
     *
     * @return $this
     */
    public function setHighestPrice($highestPrice)
    {
        $this->container['highestPrice'] = $highestPrice;

        return $this;
    }

    /**
     * Gets lowestPrice
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferPrice
     */
    public function getLowestPrice()
    {
        return $this->container['lowestPrice'];
    }

    /**
     * Sets lowestPrice
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferPrice $lowestPrice lowestPrice
     *
     * @return $this
     */
    public function setLowestPrice($lowestPrice)
    {
        $this->container['lowestPrice'] = $lowestPrice;

        return $this;
    }

    /**
     * Gets offerCount
     *
     * @return int
     */
    public function getOfferCount()
    {
        return $this->container['offerCount'];
    }

    /**
     * Sets offerCount
     *
     * @param int $offerCount offerCount
     *
     * @return $this
     */
    public function setOfferCount($offerCount)
    {
        $this->container['offerCount'] = $offerCount;

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


