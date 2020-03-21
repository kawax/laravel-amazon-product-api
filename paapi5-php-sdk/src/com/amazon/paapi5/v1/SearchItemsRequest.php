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
 * SearchItemsRequest Class Doc Comment
 *
 * @category Class
 * @package  Amazon\ProductAdvertisingAPI\v1
 * @author   Product Advertising API team
 */
class SearchItemsRequest implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'SearchItemsRequest';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'actor' => 'string',
        'artist' => 'string',
        'author' => 'string',
        'availability' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\Availability',
        'brand' => 'string',
        'browseNodeId' => 'string',
        'condition' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\Condition',
        'currencyOfPreference' => 'string',
        'deliveryFlags' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\DeliveryFlag[]',
        'itemCount' => 'int',
        'itemPage' => 'int',
        'keywords' => 'string',
        'languagesOfPreference' => 'string[]',
        'marketplace' => 'string',
        'maxPrice' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\MaxPrice',
        'merchant' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\Merchant',
        'minPrice' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\MinPrice',
        'minReviewsRating' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\MinReviewsRating',
        'minSavingPercent' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\MinSavingPercent',
        'offerCount' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\OfferCount',
        'partnerTag' => 'string',
        'partnerType' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\PartnerType',
        'properties' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\Properties',
        'resources' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\SearchItemsResource[]',
        'searchIndex' => 'string',
        'sortBy' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\SortBy',
        'title' => 'string'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'actor' => null,
        'artist' => null,
        'author' => null,
        'availability' => null,
        'brand' => null,
        'browseNodeId' => null,
        'condition' => null,
        'currencyOfPreference' => null,
        'deliveryFlags' => null,
        'itemCount' => 'int32',
        'itemPage' => 'int32',
        'keywords' => null,
        'languagesOfPreference' => null,
        'marketplace' => null,
        'maxPrice' => null,
        'merchant' => null,
        'minPrice' => null,
        'minReviewsRating' => null,
        'minSavingPercent' => null,
        'offerCount' => null,
        'partnerTag' => null,
        'partnerType' => null,
        'properties' => null,
        'resources' => null,
        'searchIndex' => null,
        'sortBy' => null,
        'title' => null
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
        'actor' => 'Actor',
        'artist' => 'Artist',
        'author' => 'Author',
        'availability' => 'Availability',
        'brand' => 'Brand',
        'browseNodeId' => 'BrowseNodeId',
        'condition' => 'Condition',
        'currencyOfPreference' => 'CurrencyOfPreference',
        'deliveryFlags' => 'DeliveryFlags',
        'itemCount' => 'ItemCount',
        'itemPage' => 'ItemPage',
        'keywords' => 'Keywords',
        'languagesOfPreference' => 'LanguagesOfPreference',
        'marketplace' => 'Marketplace',
        'maxPrice' => 'MaxPrice',
        'merchant' => 'Merchant',
        'minPrice' => 'MinPrice',
        'minReviewsRating' => 'MinReviewsRating',
        'minSavingPercent' => 'MinSavingPercent',
        'offerCount' => 'OfferCount',
        'partnerTag' => 'PartnerTag',
        'partnerType' => 'PartnerType',
        'properties' => 'Properties',
        'resources' => 'Resources',
        'searchIndex' => 'SearchIndex',
        'sortBy' => 'SortBy',
        'title' => 'Title'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'actor' => 'setActor',
        'artist' => 'setArtist',
        'author' => 'setAuthor',
        'availability' => 'setAvailability',
        'brand' => 'setBrand',
        'browseNodeId' => 'setBrowseNodeId',
        'condition' => 'setCondition',
        'currencyOfPreference' => 'setCurrencyOfPreference',
        'deliveryFlags' => 'setDeliveryFlags',
        'itemCount' => 'setItemCount',
        'itemPage' => 'setItemPage',
        'keywords' => 'setKeywords',
        'languagesOfPreference' => 'setLanguagesOfPreference',
        'marketplace' => 'setMarketplace',
        'maxPrice' => 'setMaxPrice',
        'merchant' => 'setMerchant',
        'minPrice' => 'setMinPrice',
        'minReviewsRating' => 'setMinReviewsRating',
        'minSavingPercent' => 'setMinSavingPercent',
        'offerCount' => 'setOfferCount',
        'partnerTag' => 'setPartnerTag',
        'partnerType' => 'setPartnerType',
        'properties' => 'setProperties',
        'resources' => 'setResources',
        'searchIndex' => 'setSearchIndex',
        'sortBy' => 'setSortBy',
        'title' => 'setTitle'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'actor' => 'getActor',
        'artist' => 'getArtist',
        'author' => 'getAuthor',
        'availability' => 'getAvailability',
        'brand' => 'getBrand',
        'browseNodeId' => 'getBrowseNodeId',
        'condition' => 'getCondition',
        'currencyOfPreference' => 'getCurrencyOfPreference',
        'deliveryFlags' => 'getDeliveryFlags',
        'itemCount' => 'getItemCount',
        'itemPage' => 'getItemPage',
        'keywords' => 'getKeywords',
        'languagesOfPreference' => 'getLanguagesOfPreference',
        'marketplace' => 'getMarketplace',
        'maxPrice' => 'getMaxPrice',
        'merchant' => 'getMerchant',
        'minPrice' => 'getMinPrice',
        'minReviewsRating' => 'getMinReviewsRating',
        'minSavingPercent' => 'getMinSavingPercent',
        'offerCount' => 'getOfferCount',
        'partnerTag' => 'getPartnerTag',
        'partnerType' => 'getPartnerType',
        'properties' => 'getProperties',
        'resources' => 'getResources',
        'searchIndex' => 'getSearchIndex',
        'sortBy' => 'getSortBy',
        'title' => 'getTitle'
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
        $this->container['actor'] = isset($data['actor']) ? $data['actor'] : null;
        $this->container['artist'] = isset($data['artist']) ? $data['artist'] : null;
        $this->container['author'] = isset($data['author']) ? $data['author'] : null;
        $this->container['availability'] = isset($data['availability']) ? $data['availability'] : null;
        $this->container['brand'] = isset($data['brand']) ? $data['brand'] : null;
        $this->container['browseNodeId'] = isset($data['browseNodeId']) ? $data['browseNodeId'] : null;
        $this->container['condition'] = isset($data['condition']) ? $data['condition'] : null;
        $this->container['currencyOfPreference'] = isset($data['currencyOfPreference']) ? $data['currencyOfPreference'] : null;
        $this->container['deliveryFlags'] = isset($data['deliveryFlags']) ? $data['deliveryFlags'] : null;
        $this->container['itemCount'] = isset($data['itemCount']) ? $data['itemCount'] : null;
        $this->container['itemPage'] = isset($data['itemPage']) ? $data['itemPage'] : null;
        $this->container['keywords'] = isset($data['keywords']) ? $data['keywords'] : null;
        $this->container['languagesOfPreference'] = isset($data['languagesOfPreference']) ? $data['languagesOfPreference'] : null;
        $this->container['marketplace'] = isset($data['marketplace']) ? $data['marketplace'] : null;
        $this->container['maxPrice'] = isset($data['maxPrice']) ? $data['maxPrice'] : null;
        $this->container['merchant'] = isset($data['merchant']) ? $data['merchant'] : null;
        $this->container['minPrice'] = isset($data['minPrice']) ? $data['minPrice'] : null;
        $this->container['minReviewsRating'] = isset($data['minReviewsRating']) ? $data['minReviewsRating'] : null;
        $this->container['minSavingPercent'] = isset($data['minSavingPercent']) ? $data['minSavingPercent'] : null;
        $this->container['offerCount'] = isset($data['offerCount']) ? $data['offerCount'] : null;
        $this->container['partnerTag'] = isset($data['partnerTag']) ? $data['partnerTag'] : null;
        $this->container['partnerType'] = isset($data['partnerType']) ? $data['partnerType'] : null;
        $this->container['properties'] = isset($data['properties']) ? $data['properties'] : null;
        $this->container['resources'] = isset($data['resources']) ? $data['resources'] : null;
        $this->container['searchIndex'] = isset($data['searchIndex']) ? $data['searchIndex'] : null;
        $this->container['sortBy'] = isset($data['sortBy']) ? $data['sortBy'] : null;
        $this->container['title'] = isset($data['title']) ? $data['title'] : null;
    }

    /**
     * Show all the invalid properties with reasons.
     *
     * @return array invalid properties with reasons
     */
    public function listInvalidProperties()
    {
        $invalidProperties = [];

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
     * Gets actor
     *
     * @return string
     */
    public function getActor()
    {
        return $this->container['actor'];
    }

    /**
     * Sets actor
     *
     * @param string $actor actor
     *
     * @return $this
     */
    public function setActor($actor)
    {
        $this->container['actor'] = $actor;

        return $this;
    }

    /**
     * Gets artist
     *
     * @return string
     */
    public function getArtist()
    {
        return $this->container['artist'];
    }

    /**
     * Sets artist
     *
     * @param string $artist artist
     *
     * @return $this
     */
    public function setArtist($artist)
    {
        $this->container['artist'] = $artist;

        return $this;
    }

    /**
     * Gets author
     *
     * @return string
     */
    public function getAuthor()
    {
        return $this->container['author'];
    }

    /**
     * Sets author
     *
     * @param string $author author
     *
     * @return $this
     */
    public function setAuthor($author)
    {
        $this->container['author'] = $author;

        return $this;
    }

    /**
     * Gets availability
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\Availability
     */
    public function getAvailability()
    {
        return $this->container['availability'];
    }

    /**
     * Sets availability
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\Availability $availability availability
     *
     * @return $this
     */
    public function setAvailability($availability)
    {
        $this->container['availability'] = $availability;

        return $this;
    }

    /**
     * Gets brand
     *
     * @return string
     */
    public function getBrand()
    {
        return $this->container['brand'];
    }

    /**
     * Sets brand
     *
     * @param string $brand brand
     *
     * @return $this
     */
    public function setBrand($brand)
    {
        $this->container['brand'] = $brand;

        return $this;
    }

    /**
     * Gets browseNodeId
     *
     * @return string
     */
    public function getBrowseNodeId()
    {
        return $this->container['browseNodeId'];
    }

    /**
     * Sets browseNodeId
     *
     * @param string $browseNodeId browseNodeId
     *
     * @return $this
     */
    public function setBrowseNodeId($browseNodeId)
    {
        $this->container['browseNodeId'] = $browseNodeId;

        return $this;
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
     * Gets deliveryFlags
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\DeliveryFlag[]
     */
    public function getDeliveryFlags()
    {
        return $this->container['deliveryFlags'];
    }

    /**
     * Sets deliveryFlags
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\DeliveryFlag[] $deliveryFlags deliveryFlags
     *
     * @return $this
     */
    public function setDeliveryFlags($deliveryFlags)
    {
        $this->container['deliveryFlags'] = $deliveryFlags;

        return $this;
    }

    /**
     * Gets itemCount
     *
     * @return int
     */
    public function getItemCount()
    {
        return $this->container['itemCount'];
    }

    /**
     * Sets itemCount
     *
     * @param int $itemCount itemCount
     *
     * @return $this
     */
    public function setItemCount($itemCount)
    {
        $this->container['itemCount'] = $itemCount;

        return $this;
    }

    /**
     * Gets itemPage
     *
     * @return int
     */
    public function getItemPage()
    {
        return $this->container['itemPage'];
    }

    /**
     * Sets itemPage
     *
     * @param int $itemPage itemPage
     *
     * @return $this
     */
    public function setItemPage($itemPage)
    {
        $this->container['itemPage'] = $itemPage;

        return $this;
    }

    /**
     * Gets keywords
     *
     * @return string
     */
    public function getKeywords()
    {
        return $this->container['keywords'];
    }

    /**
     * Sets keywords
     *
     * @param string $keywords keywords
     *
     * @return $this
     */
    public function setKeywords($keywords)
    {
        $this->container['keywords'] = $keywords;

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
     * Gets maxPrice
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\MaxPrice
     */
    public function getMaxPrice()
    {
        return $this->container['maxPrice'];
    }

    /**
     * Sets maxPrice
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\MaxPrice $maxPrice maxPrice
     *
     * @return $this
     */
    public function setMaxPrice($maxPrice)
    {
        $this->container['maxPrice'] = $maxPrice;

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
     * Gets minPrice
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\MinPrice
     */
    public function getMinPrice()
    {
        return $this->container['minPrice'];
    }

    /**
     * Sets minPrice
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\MinPrice $minPrice minPrice
     *
     * @return $this
     */
    public function setMinPrice($minPrice)
    {
        $this->container['minPrice'] = $minPrice;

        return $this;
    }

    /**
     * Gets minReviewsRating
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\MinReviewsRating
     */
    public function getMinReviewsRating()
    {
        return $this->container['minReviewsRating'];
    }

    /**
     * Sets minReviewsRating
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\MinReviewsRating $minReviewsRating minReviewsRating
     *
     * @return $this
     */
    public function setMinReviewsRating($minReviewsRating)
    {
        $this->container['minReviewsRating'] = $minReviewsRating;

        return $this;
    }

    /**
     * Gets minSavingPercent
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\MinSavingPercent
     */
    public function getMinSavingPercent()
    {
        return $this->container['minSavingPercent'];
    }

    /**
     * Sets minSavingPercent
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\MinSavingPercent $minSavingPercent minSavingPercent
     *
     * @return $this
     */
    public function setMinSavingPercent($minSavingPercent)
    {
        $this->container['minSavingPercent'] = $minSavingPercent;

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
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\SearchItemsResource[]
     */
    public function getResources()
    {
        return $this->container['resources'];
    }

    /**
     * Sets resources
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\SearchItemsResource[] $resources resources
     *
     * @return $this
     */
    public function setResources($resources)
    {
        $this->container['resources'] = $resources;

        return $this;
    }

    /**
     * Gets searchIndex
     *
     * @return string
     */
    public function getSearchIndex()
    {
        return $this->container['searchIndex'];
    }

    /**
     * Sets searchIndex
     *
     * @param string $searchIndex searchIndex
     *
     * @return $this
     */
    public function setSearchIndex($searchIndex)
    {
        $this->container['searchIndex'] = $searchIndex;

        return $this;
    }

    /**
     * Gets sortBy
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\SortBy
     */
    public function getSortBy()
    {
        return $this->container['sortBy'];
    }

    /**
     * Sets sortBy
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\SortBy $sortBy sortBy
     *
     * @return $this
     */
    public function setSortBy($sortBy)
    {
        $this->container['sortBy'] = $sortBy;

        return $this;
    }

    /**
     * Gets title
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->container['title'];
    }

    /**
     * Sets title
     *
     * @param string $title title
     *
     * @return $this
     */
    public function setTitle($title)
    {
        $this->container['title'] = $title;

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


