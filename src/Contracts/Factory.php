<?php

namespace Revolution\Amazon\ProductAdvertising\Contracts;

use Amazon\ProductAdvertisingAPI\v1\ApiException;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\api\DefaultApi;

interface Factory
{
    /**
     * @return DefaultApi
     */
    public function api(): DefaultApi;

    /**
     * @param  DefaultApi  $api
     * @return $this
     */
    public function config(DefaultApi $api);

    /**
     * @param  DefaultApi|callable  $api
     * @return $this
     */
    public function apiUsing($api);

    /**
     * @param  string  $category
     * @param  string|null  $keyword
     * @param  int  $page
     * @return mixed
     *
     * @throws ApiException
     */
    public function search(string $category, string $keyword = null, int $page = 1);

    /**
     * @param  string  $node
     * @param  string  $sort
     * @return mixed
     *
     * @throws ApiException
     */
    public function browse(string $node, string $sort = 'TopSellers');

    /**
     * @param  string  $asin
     * @return mixed
     *
     * @throws ApiException
     */
    public function item(string $asin);

    /**
     * @param  array  $asin
     * @return mixed
     *
     * @throws ApiException
     */
    public function items(array $asin);

    /**
     * @param  string  $asin
     * @param  int  $page
     * @return mixed
     *
     * @throws ApiException
     */
    public function variations(string $asin, int $page = 1);

    /**
     * ASIN (Default), SKU, UPC, EAN, and ISBN.
     *
     * @param  string  $idType
     * @return Factory
     */
    public function setIdType(string $idType): self;

    /**
     * @return string
     */
    public function getIdType(): string;
}
