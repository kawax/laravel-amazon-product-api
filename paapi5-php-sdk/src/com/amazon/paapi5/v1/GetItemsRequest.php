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
 * GetItemsRequest Class Doc Comment
 *
 * @category Class
 * @package  Amazon\ProductAdvertisingAPI\v1
 * @author   Product Advertising API team
 */
class GetItemsRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'GetItemsRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'condition' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\Condition',
        'currencyOfPreference' => 'string',
        'itemIds' => 'string[]',
        'itemIdType' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\ItemIdType',
        'languagesOfPreference' => 'string[]',
        'marketplace' => 'string',
        'merchant' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\Merchant',
        'offerCount' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferCount',
        'partnerTag' => 'string',
        'partnerType' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\PartnerType',
        'properties' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\Properties',
        'resources' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\GetItemsResource[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'condition' => null,
        'currencyOfPreference' => null,
        'itemIds' => null,
        'itemIdType' => null,
        'languagesOfPreference' => null,
        'marketplace' => null,
        'merchant' => null,
        'offerCount' => null,
        'partnerTag' => null,
        'partnerType' => null,
        'properties' => null,
        'resources' => null
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
        'currencyOfPreference' => 'CurrencyOfPreference',
        'itemIds' => 'ItemIds',
        'itemIdType' => 'ItemIdType',
        'languagesOfPreference' => 'LanguagesOfPreference',
        'marketplace' => 'Marketplace',
        'merchant' => 'Merchant',
        'offerCount' => 'OfferCount',
        'partnerTag' => 'PartnerTag',
        'partnerType' => 'PartnerType',
        'properties' => 'Properties',
        'resources' => 'Resources'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'condition' => 'setCondition',
        'currencyOfPreference' => 'setCurrencyOfPreference',
        'itemIds' => 'setItemIds',
        'itemIdType' => 'setItemIdType',
        'languagesOfPreference' => 'setLanguagesOfPreference',
        'marketplace' => 'setMarketplace',
        'merchant' => 'setMerchant',
        'offerCount' => 'setOfferCount',
        'partnerTag' => 'setPartnerTag',
        'partnerType' => 'setPartnerType',
        'properties' => 'setProperties',
        'resources' => 'setResources'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'condition' => 'getCondition',
        'currencyOfPreference' => 'getCurrencyOfPreference',
        'itemIds' => 'getItemIds',
        'itemIdType' => 'getItemIdType',
        'languagesOfPreference' => 'getLanguagesOfPreference',
        'marketplace' => 'getMarketplace',
        'merchant' => 'getMerchant',
        'offerCount' => 'getOfferCount',
        'partnerTag' => 'getPartnerTag',
        'partnerType' => 'getPartnerType',
        'properties' => 'getProperties',
        'resources' => 'getResources'
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
        $this->container['currencyOfPreference'] = isset($data['currencyOfPreference']) ? $data['currencyOfPreference'] : null;
        $this->container['itemIds'] = isset($data['itemIds']) ? $data['itemIds'] : null;
        $this->container['itemIdType'] = isset($data['itemIdType']) ? $data['itemIdType'] : null;
        $this->container['languagesOfPreference'] = isset($data['languagesOfPreference']) ? $data['languagesOfPreference'] : null;
        $this->container['marketplace'] = isset($data['marketplace']) ? $data['marketplace'] : null;
        $this->container['merchant'] = isset($data['merchant']) ? $data['merchant'] : null;
        $this->container['offerCount'] = isset($data['offerCount']) ? $data['offerCount'] : null;
        $this->container['partnerTag'] = isset($data['partnerTag']) ? $data['partnerTag'] : null;
        $this->container['partnerType'] = isset($data['partnerType']) ? $data['partnerType'] : null;
        $this->container['properties'] = isset($data['properties']) ? $data['properties'] : null;
        $this->container['resources'] = isset($data['resources']) ? $data['resources'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

        if ($this->container['itemIds'] === null) {
            $invalidProperties[] = "'itemIds' can't be null";
        }
        if ($this->container['partnerTag'] === null) {
            $invalidProperties[] = "'partnerTag' can't be null";
        }
        if ($this->container['partnerType'] === null) {
            $invalidProperties[] = "'partnerType' can't be null";
        }
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
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\Condition
     */
    public function getCondition()
    {
        return $this->container['condition'];
    }

    /**
     * Sets condition
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\Condition $condition condition
     *
     * @return $this
     */
    public function setCondition($condition)
    {
        $this->container['condition'] = $condition;

        return $this;
    }

    /**
     * Gets currencyOfPreference
     *
     * @return string
     */
    public function getCurrencyOfPreference()
    {
        return $this->container['currencyOfPreference'];
    }

    /**
     * Sets currencyOfPreference
     *
     * @param string $currencyOfPreference currencyOfPreference
     *
     * @return $this
     */
    public function setCurrencyOfPreference($currencyOfPreference)
    {
        $this->container['currencyOfPreference'] = $currencyOfPreference;

        return $this;
    }

    /**
     * Gets itemIds
     *
     * @return string[]
     */
    public function getItemIds()
    {
        return $this->container['itemIds'];
    }

    /**
     * Sets itemIds
     *
     * @param string[] $itemIds itemIds
     *
     * @return $this
     */
    public function setItemIds($itemIds)
    {
        $this->container['itemIds'] = $itemIds;

        return $this;
    }

    /**
     * Gets itemIdType
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\ItemIdType
     */
    public function getItemIdType()
    {
        return $this->container['itemIdType'];
    }

    /**
     * Sets itemIdType
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\ItemIdType $itemIdType itemIdType
     *
     * @return $this
     */
    public function setItemIdType($itemIdType)
    {
        $this->container['itemIdType'] = $itemIdType;

        return $this;
    }

    /**
     * Gets languagesOfPreference
     *
     * @return string[]
     */
    public function getLanguagesOfPreference()
    {
        return $this->container['languagesOfPreference'];
    }

    /**
     * Sets languagesOfPreference
     *
     * @param string[] $languagesOfPreference languagesOfPreference
     *
     * @return $this
     */
    public function setLanguagesOfPreference($languagesOfPreference)
    {
        $this->container['languagesOfPreference'] = $languagesOfPreference;

        return $this;
    }

    /**
     * Gets marketplace
     *
     * @return string
     */
    public function getMarketplace()
    {
        return $this->container['marketplace'];
    }

    /**
     * Sets marketplace
     *
     * @param string $marketplace marketplace
     *
     * @return $this
     */
    public function setMarketplace($marketplace)
    {
        $this->container['marketplace'] = $marketplace;

        return $this;
    }

    /**
     * Gets merchant
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\Merchant
     */
    public function getMerchant()
    {
        return $this->container['merchant'];
    }

    /**
     * Sets merchant
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\Merchant $merchant merchant
     *
     * @return $this
     */
    public function setMerchant($merchant)
    {
        $this->container['merchant'] = $merchant;

        return $this;
    }

    /**
     * Gets offerCount
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferCount
     */
    public function getOfferCount()
    {
        return $this->container['offerCount'];
    }

    /**
     * Sets offerCount
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferCount $offerCount offerCount
     *
     * @return $this
     */
    public function setOfferCount($offerCount)
    {
        $this->container['offerCount'] = $offerCount;

        return $this;
    }

    /**
     * Gets partnerTag
     *
     * @return string
     */
    public function getPartnerTag()
    {
        return $this->container['partnerTag'];
    }

    /**
     * Sets partnerTag
     *
     * @param string $partnerTag partnerTag
     *
     * @return $this
     */
    public function setPartnerTag($partnerTag)
    {
        $this->container['partnerTag'] = $partnerTag;

        return $this;
    }

    /**
     * Gets partnerType
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\PartnerType
     */
    public function getPartnerType()
    {
        return $this->container['partnerType'];
    }

    /**
     * Sets partnerType
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\PartnerType $partnerType partnerType
     *
     * @return $this
     */
    public function setPartnerType($partnerType)
    {
        $this->container['partnerType'] = $partnerType;

        return $this;
    }

    /**
     * Gets properties
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\Properties
     */
    public function getProperties()
    {
        return $this->container['properties'];
    }

    /**
     * Sets properties
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\Properties $properties properties
     *
     * @return $this
     */
    public function setProperties($properties)
    {
        $this->container['properties'] = $properties;

        return $this;
    }

    /**
     * Gets resources
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\GetItemsResource[]
     */
    public function getResources()
    {
        return $this->container['resources'];
    }

    /**
     * Sets resources
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\GetItemsResource[] $resources resources
     *
     * @return $this
     */
    public function setResources($resources)
    {
        $this->container['resources'] = $resources;

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


