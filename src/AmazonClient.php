<?php

namespace Revolution\Amazon\ProductAdvertising;

use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\api\DefaultApi;
use Illuminate\Support\Traits\Macroable;
use Revolution\Amazon\ProductAdvertising\Contracts\Factory;

class AmazonClient implements Factory
{
    use Concerns\Browse;
    use Concerns\Item;
    use Concerns\Search;
    use Concerns\Variation;
    use Macroable;
    use Hookable;

    public function __construct(
        protected DefaultApi $api,
        protected string $idType = 'ASIN',
    ) {
        //
    }

    public function api(): DefaultApi
    {
        return $this->api;
    }

    public function config(DefaultApi $api): static
    {
        $this->api = $api;

        return $this;
    }

    public function apiUsing(callable|DefaultApi $api): static
    {
        $this->api = is_callable($api) ? call_user_func($api) : $api;

        return $this;
    }

    /**
     * ASIN (Default), SKU, UPC, EAN, and ISBN.
     */
    public function setIdType(string $idType): static
    {
        $this->idType = $idType;

        return $this;
    }

    public function getIdType(): string
    {
        return $this->idType;
    }
}
