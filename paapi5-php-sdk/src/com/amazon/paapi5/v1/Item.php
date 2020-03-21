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
 * Item Class Doc Comment
 *
 * @category Class
 * @package  Amazon\ProductAdvertisingAPI\v1
 * @author   Product Advertising API team
 */
class Item implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'Item';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'aSIN' => 'string',
        'browseNodeInfo' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\BrowseNodeInfo',
        'customerReviews' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\CustomerReviews',
        'detailPageURL' => 'string',
        'images' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\Images',
        'itemInfo' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\ItemInfo',
        'offers' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\Offers',
        'parentASIN' => 'string',
        'rentalOffers' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\RentalOffers',
        'score' => 'float',
        'variationAttributes' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\VariationAttribute[]'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'aSIN' => null,
        'browseNodeInfo' => null,
        'customerReviews' => null,
        'detailPageURL' => null,
        'images' => null,
        'itemInfo' => null,
        'offers' => null,
        'parentASIN' => null,
        'rentalOffers' => null,
        'score' => null,
        'variationAttributes' => null
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
        'aSIN' => 'ASIN',
        'browseNodeInfo' => 'BrowseNodeInfo',
        'customerReviews' => 'CustomerReviews',
        'detailPageURL' => 'DetailPageURL',
        'images' => 'Images',
        'itemInfo' => 'ItemInfo',
        'offers' => 'Offers',
        'parentASIN' => 'ParentASIN',
        'rentalOffers' => 'RentalOffers',
        'score' => 'Score',
        'variationAttributes' => 'VariationAttributes'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'aSIN' => 'setASIN',
        'browseNodeInfo' => 'setBrowseNodeInfo',
        'customerReviews' => 'setCustomerReviews',
        'detailPageURL' => 'setDetailPageURL',
        'images' => 'setImages',
        'itemInfo' => 'setItemInfo',
        'offers' => 'setOffers',
        'parentASIN' => 'setParentASIN',
        'rentalOffers' => 'setRentalOffers',
        'score' => 'setScore',
        'variationAttributes' => 'setVariationAttributes'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'aSIN' => 'getASIN',
        'browseNodeInfo' => 'getBrowseNodeInfo',
        'customerReviews' => 'getCustomerReviews',
        'detailPageURL' => 'getDetailPageURL',
        'images' => 'getImages',
        'itemInfo' => 'getItemInfo',
        'offers' => 'getOffers',
        'parentASIN' => 'getParentASIN',
        'rentalOffers' => 'getRentalOffers',
        'score' => 'getScore',
        'variationAttributes' => 'getVariationAttributes'
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
        $this->container['aSIN'] = isset($data['aSIN']) ? $data['aSIN'] : null;
        $this->container['browseNodeInfo'] = isset($data['browseNodeInfo']) ? $data['browseNodeInfo'] : null;
        $this->container['customerReviews'] = isset($data['customerReviews']) ? $data['customerReviews'] : null;
        $this->container['detailPageURL'] = isset($data['detailPageURL']) ? $data['detailPageURL'] : null;
        $this->container['images'] = isset($data['images']) ? $data['images'] : null;
        $this->container['itemInfo'] = isset($data['itemInfo']) ? $data['itemInfo'] : null;
        $this->container['offers'] = isset($data['offers']) ? $data['offers'] : null;
        $this->container['parentASIN'] = isset($data['parentASIN']) ? $data['parentASIN'] : null;
        $this->container['rentalOffers'] = isset($data['rentalOffers']) ? $data['rentalOffers'] : null;
        $this->container['score'] = isset($data['score']) ? $data['score'] : null;
        $this->container['variationAttributes'] = isset($data['variationAttributes']) ? $data['variationAttributes'] : null;
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
     * Gets aSIN
     *
     * @return string
     */
    public function getASIN()
    {
        return $this->container['aSIN'];
    }

    /**
     * Sets aSIN
     *
     * @param string $aSIN aSIN
     *
     * @return $this
     */
    public function setASIN($aSIN)
    {
        $this->container['aSIN'] = $aSIN;

        return $this;
    }

    /**
     * Gets browseNodeInfo
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\BrowseNodeInfo
     */
    public function getBrowseNodeInfo()
    {
        return $this->container['browseNodeInfo'];
    }

    /**
     * Sets browseNodeInfo
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\BrowseNodeInfo $browseNodeInfo browseNodeInfo
     *
     * @return $this
     */
    public function setBrowseNodeInfo($browseNodeInfo)
    {
        $this->container['browseNodeInfo'] = $browseNodeInfo;

        return $this;
    }

    /**
     * Gets customerReviews
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\CustomerReviews
     */
    public function getCustomerReviews()
    {
        return $this->container['customerReviews'];
    }

    /**
     * Sets customerReviews
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\CustomerReviews $customerReviews customerReviews
     *
     * @return $this
     */
    public function setCustomerReviews($customerReviews)
    {
        $this->container['customerReviews'] = $customerReviews;

        return $this;
    }

    /**
     * Gets detailPageURL
     *
     * @return string
     */
    public function getDetailPageURL()
    {
        return $this->container['detailPageURL'];
    }

    /**
     * Sets detailPageURL
     *
     * @param string $detailPageURL detailPageURL
     *
     * @return $this
     */
    public function setDetailPageURL($detailPageURL)
    {
        $this->container['detailPageURL'] = $detailPageURL;

        return $this;
    }

    /**
     * Gets images
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\Images
     */
    public function getImages()
    {
        return $this->container['images'];
    }

    /**
     * Sets images
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\Images $images images
     *
     * @return $this
     */
    public function setImages($images)
    {
        $this->container['images'] = $images;

        return $this;
    }

    /**
     * Gets itemInfo
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\ItemInfo
     */
    public function getItemInfo()
    {
        return $this->container['itemInfo'];
    }

    /**
     * Sets itemInfo
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\ItemInfo $itemInfo itemInfo
     *
     * @return $this
     */
    public function setItemInfo($itemInfo)
    {
        $this->container['itemInfo'] = $itemInfo;

        return $this;
    }

    /**
     * Gets offers
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\Offers
     */
    public function getOffers()
    {
        return $this->container['offers'];
    }

    /**
     * Sets offers
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\Offers $offers offers
     *
     * @return $this
     */
    public function setOffers($offers)
    {
        $this->container['offers'] = $offers;

        return $this;
    }

    /**
     * Gets parentASIN
     *
     * @return string
     */
    public function getParentASIN()
    {
        return $this->container['parentASIN'];
    }

    /**
     * Sets parentASIN
     *
     * @param string $parentASIN parentASIN
     *
     * @return $this
     */
    public function setParentASIN($parentASIN)
    {
        $this->container['parentASIN'] = $parentASIN;

        return $this;
    }

    /**
     * Gets rentalOffers
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\RentalOffers
     */
    public function getRentalOffers()
    {
        return $this->container['rentalOffers'];
    }

    /**
     * Sets rentalOffers
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\RentalOffers $rentalOffers rentalOffers
     *
     * @return $this
     */
    public function setRentalOffers($rentalOffers)
    {
        $this->container['rentalOffers'] = $rentalOffers;

        return $this;
    }

    /**
     * Gets score
     *
     * @return float
     */
    public function getScore()
    {
        return $this->container['score'];
    }

    /**
     * Sets score
     *
     * @param float $score score
     *
     * @return $this
     */
    public function setScore($score)
    {
        $this->container['score'] = $score;

        return $this;
    }

    /**
     * Gets variationAttributes
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\VariationAttribute[]
     */
    public function getVariationAttributes()
    {
        return $this->container['variationAttributes'];
    }

    /**
     * Sets variationAttributes
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\VariationAttribute[] $variationAttributes variationAttributes
     *
     * @return $this
     */
    public function setVariationAttributes($variationAttributes)
    {
        $this->container['variationAttributes'] = $variationAttributes;

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


