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
 * OfferPrice Class Doc Comment
 *
 * @category Class
 * @package  Amazon\ProductAdvertisingAPI\v1
 * @author   Product Advertising API team
 */
class OfferPrice implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'OfferPrice';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'amount' => 'float',
        'currency' => 'string',
        'displayAmount' => 'string',
        'pricePerUnit' => 'float',
        'priceType' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\PriceType',
        'priceTypeLabel' => 'string',
        'savings' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferSavings'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'amount' => null,
        'currency' => null,
        'displayAmount' => null,
        'pricePerUnit' => null,
        'priceType' => null,
        'priceTypeLabel' => null,
        'savings' => null
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
        'amount' => 'Amount',
        'currency' => 'Currency',
        'displayAmount' => 'DisplayAmount',
        'pricePerUnit' => 'PricePerUnit',
        'priceType' => 'PriceType',
        'priceTypeLabel' => 'PriceTypeLabel',
        'savings' => 'Savings'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'amount' => 'setAmount',
        'currency' => 'setCurrency',
        'displayAmount' => 'setDisplayAmount',
        'pricePerUnit' => 'setPricePerUnit',
        'priceType' => 'setPriceType',
        'priceTypeLabel' => 'setPriceTypeLabel',
        'savings' => 'setSavings'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'amount' => 'getAmount',
        'currency' => 'getCurrency',
        'displayAmount' => 'getDisplayAmount',
        'pricePerUnit' => 'getPricePerUnit',
        'priceType' => 'getPriceType',
        'priceTypeLabel' => 'getPriceTypeLabel',
        'savings' => 'getSavings'
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
        $this->container['amount'] = isset($data['amount']) ? $data['amount'] : null;
        $this->container['currency'] = isset($data['currency']) ? $data['currency'] : null;
        $this->container['displayAmount'] = isset($data['displayAmount']) ? $data['displayAmount'] : null;
        $this->container['pricePerUnit'] = isset($data['pricePerUnit']) ? $data['pricePerUnit'] : null;
        $this->container['priceType'] = isset($data['priceType']) ? $data['priceType'] : null;
        $this->container['priceTypeLabel'] = isset($data['priceTypeLabel']) ? $data['priceTypeLabel'] : null;
        $this->container['savings'] = isset($data['savings']) ? $data['savings'] : null;
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
     * Gets amount
     *
     * @return float
     */
    public function getAmount()
    {
        return $this->container['amount'];
    }

    /**
     * Sets amount
     *
     * @param float $amount amount
     *
     * @return $this
     */
    public function setAmount($amount)
    {
        $this->container['amount'] = $amount;

        return $this;
    }

    /**
     * Gets currency
     *
     * @return string
     */
    public function getCurrency()
    {
        return $this->container['currency'];
    }

    /**
     * Sets currency
     *
     * @param string $currency currency
     *
     * @return $this
     */
    public function setCurrency($currency)
    {
        $this->container['currency'] = $currency;

        return $this;
    }

    /**
     * Gets displayAmount
     *
     * @return string
     */
    public function getDisplayAmount()
    {
        return $this->container['displayAmount'];
    }

    /**
     * Sets displayAmount
     *
     * @param string $displayAmount displayAmount
     *
     * @return $this
     */
    public function setDisplayAmount($displayAmount)
    {
        $this->container['displayAmount'] = $displayAmount;

        return $this;
    }

    /**
     * Gets pricePerUnit
     *
     * @return float
     */
    public function getPricePerUnit()
    {
        return $this->container['pricePerUnit'];
    }

    /**
     * Sets pricePerUnit
     *
     * @param float $pricePerUnit pricePerUnit
     *
     * @return $this
     */
    public function setPricePerUnit($pricePerUnit)
    {
        $this->container['pricePerUnit'] = $pricePerUnit;

        return $this;
    }

    /**
     * Gets priceType
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\PriceType
     */
    public function getPriceType()
    {
        return $this->container['priceType'];
    }

    /**
     * Sets priceType
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\PriceType $priceType priceType
     *
     * @return $this
     */
    public function setPriceType($priceType)
    {
        $this->container['priceType'] = $priceType;

        return $this;
    }

    /**
     * Gets priceTypeLabel
     *
     * @return string
     */
    public function getPriceTypeLabel()
    {
        return $this->container['priceTypeLabel'];
    }

    /**
     * Sets priceTypeLabel
     *
     * @param string $priceTypeLabel priceTypeLabel
     *
     * @return $this
     */
    public function setPriceTypeLabel($priceTypeLabel)
    {
        $this->container['priceTypeLabel'] = $priceTypeLabel;

        return $this;
    }

    /**
     * Gets savings
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferSavings
     */
    public function getSavings()
    {
        return $this->container['savings'];
    }

    /**
     * Sets savings
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferSavings $savings savings
     *
     * @return $this
     */
    public function setSavings($savings)
    {
        $this->container['savings'] = $savings;

        return $this;
    }
    /**
     * Returns true if offset exists. False otherwise.
     *
     * @param integer $offset Offset
     *
     * @return boolean
     */
    public function offsetExists($offset) : bool
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
    public function offsetGet($offset) : mixed
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
    public function offsetSet($offset, $value) : void
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
    public function offsetUnset($offset) : void
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


