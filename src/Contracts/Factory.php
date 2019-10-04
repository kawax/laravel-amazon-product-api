<?php

namespace Revolution\Amazon\ProductAdvertising\Contracts;

use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\api\DefaultApi;
use Amazon\ProductAdvertisingAPI\v1\ApiException;

interface Factory
{
    /**
     * @param  DefaultApi  $api
     * @return $this
     */
    public function config(DefaultApi $api);

    /**
     * @param  string  $category
     * @param  string  $keyword
     * @param  int  $page
     * @return mixed
     * @throws ApiException
     */
    public function search(string $category, string $keyword = null, int $page = 1);

    /**
     * @param  string  $node
     * @param  string  $sort
     * @return mixed
     * @throws ApiException
     */
    public function browse(string $node, string $sort = 'Featured');

    /**
     * @param  string  $asin
     * @return mixed
     * @throws ApiException
     */
    public function item(string $asin);

    /**
     * @param  array  $asin
     * @return mixed
     * @throws ApiException
     */
    public function items(array $asin);

    /**
     * ASIN (Default), SKU, UPC, EAN, and ISBN
     *
     * @param  string  $idType
     * @return Factory
     */
    public function setIdType(string $idType): Factory;

    /**
     * @return string
     */
    public function getIdType(): string;
}
