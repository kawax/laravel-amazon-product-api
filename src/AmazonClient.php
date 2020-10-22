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

    /**
     * @var DefaultApi
     */
    protected $api;

    /**
     * @var string
     */
    protected $idType = 'ASIN';

    /**
     * constructor.
     *
     * @param  DefaultApi  $api
     */
    public function __construct(DefaultApi $api)
    {
        $this->api = $api;
    }

    /**
     * {@inheritdoc}
     */
    public function api(): DefaultApi
    {
        return $this->api;
    }

    /**
     * {@inheritdoc}
     */
    public function config(DefaultApi $api)
    {
        $this->api = $api;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function apiUsing($api)
    {
        $this->api = is_callable($api) ? call_user_func($api) : $api;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function setIdType(string $idType): Factory
    {
        $this->idType = $idType;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function getIdType(): string
    {
        return $this->idType;
    }
}
