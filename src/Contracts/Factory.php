<?php

namespace Revolution\Amazon\ProductAdvertising\Contracts;

use Amazon\ProductAdvertisingAPI\v1\ApiException;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\api\DefaultApi;

interface Factory
{
    public function api(): DefaultApi;

    public function config(DefaultApi $api): static;

    public function apiUsing(callable|DefaultApi $api): static;

    /**
     * @throws ApiException
     */
    public function search(string $category, string $keyword = null, int $page = 1): array;

    /**
     * @throws ApiException
     */
    public function browse(string $node, string $sort = 'TopSellers'): array;

    /**
     * @throws ApiException
     */
    public function item(string $asin): array;

    /**
     * @throws ApiException
     */
    public function items(array $asin): array;

    /**
     * @throws ApiException
     */
    public function variations(string $asin, int $page = 1): array;

    /**
     * ASIN (Default), SKU, UPC, EAN, and ISBN.
     */
    public function setIdType(string $idType): static;

    public function getIdType(): string;
}
