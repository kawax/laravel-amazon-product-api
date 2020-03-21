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
 * ContentInfo Class Doc Comment
 *
 * @category Class
 * @package  Amazon\ProductAdvertisingAPI\v1
 * @author   Product Advertising API team
 */
class ContentInfo implements ModelInterface, ArrayAccess
{
    const DISCRIMINATOR = null;

    /**
      * The original name of the model.
      *
      * @var string
      */
    protected static $swaggerModelName = 'ContentInfo';

    /**
      * Array of property to type mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerTypes = [
        'edition' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\SingleStringValuedAttribute',
        'languages' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\Languages',
        'pagesCount' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\SingleIntegerValuedAttribute',
        'publicationDate' => '\Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\SingleStringValuedAttribute'
    ];

    /**
      * Array of property to format mappings. Used for (de)serialization
      *
      * @var string[]
      */
    protected static $swaggerFormats = [
        'edition' => null,
        'languages' => null,
        'pagesCount' => null,
        'publicationDate' => null
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
        'edition' => 'Edition',
        'languages' => 'Languages',
        'pagesCount' => 'PagesCount',
        'publicationDate' => 'PublicationDate'
    ];

    /**
     * Array of attributes to setter functions (for deserialization of responses)
     *
     * @var string[]
     */
    protected static $setters = [
        'edition' => 'setEdition',
        'languages' => 'setLanguages',
        'pagesCount' => 'setPagesCount',
        'publicationDate' => 'setPublicationDate'
    ];

    /**
     * Array of attributes to getter functions (for serialization of requests)
     *
     * @var string[]
     */
    protected static $getters = [
        'edition' => 'getEdition',
        'languages' => 'getLanguages',
        'pagesCount' => 'getPagesCount',
        'publicationDate' => 'getPublicationDate'
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
        $this->container['edition'] = isset($data['edition']) ? $data['edition'] : null;
        $this->container['languages'] = isset($data['languages']) ? $data['languages'] : null;
        $this->container['pagesCount'] = isset($data['pagesCount']) ? $data['pagesCount'] : null;
        $this->container['publicationDate'] = isset($data['publicationDate']) ? $data['publicationDate'] : null;
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
     * Gets edition
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\SingleStringValuedAttribute
     */
    public function getEdition()
    {
        return $this->container['edition'];
    }

    /**
     * Sets edition
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\SingleStringValuedAttribute $edition edition
     *
     * @return $this
     */
    public function setEdition($edition)
    {
        $this->container['edition'] = $edition;

        return $this;
    }

    /**
     * Gets languages
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\Languages
     */
    public function getLanguages()
    {
        return $this->container['languages'];
    }

    /**
     * Sets languages
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\Languages $languages languages
     *
     * @return $this
     */
    public function setLanguages($languages)
    {
        $this->container['languages'] = $languages;

        return $this;
    }

    /**
     * Gets pagesCount
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\SingleIntegerValuedAttribute
     */
    public function getPagesCount()
    {
        return $this->container['pagesCount'];
    }

    /**
     * Sets pagesCount
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\SingleIntegerValuedAttribute $pagesCount pagesCount
     *
     * @return $this
     */
    public function setPagesCount($pagesCount)
    {
        $this->container['pagesCount'] = $pagesCount;

        return $this;
    }

    /**
     * Gets publicationDate
     *
     * @return \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\SingleStringValuedAttribute
     */
    public function getPublicationDate()
    {
        return $this->container['publicationDate'];
    }

    /**
     * Sets publicationDate
     *
     * @param \Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\SingleStringValuedAttribute $publicationDate publicationDate
     *
     * @return $this
     */
    public function setPublicationDate($publicationDate)
    {
        $this->container['publicationDate'] = $publicationDate;

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


