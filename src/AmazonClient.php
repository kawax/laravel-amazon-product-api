<?php

namespace Revolution\Amazon\ProductAdvertising;

use Revolution\Amazon\ProductAdvertising\Contracts\Factory;

use Illuminate\Support\Traits\Macroable;

use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\api\DefaultApi;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\PartnerType;

use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\GetItemsRequest;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\GetItemsResource;

use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\GetBrowseNodesRequest;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\GetBrowseNodesResource;

use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\SearchItemsRequest;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\SearchItemsResource;

class AmazonClient implements Factory
{
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
    public function config(DefaultApi $api)
    {
        $this->api = $api;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function search(string $category, string $keyword = null, int $page = 1)
    {
        /**
         * @var SearchItemsResource[] $resources
         */
        $resources = SearchItemsResource::getAllowableEnumValues();

        $request = new SearchItemsRequest();
        $request->setSearchIndex($category);
        $request->setKeywords($keyword);
        $request->setPartnerTag(config('amazon-product.associate_tag'));
        $request->setPartnerType(PartnerType::ASSOCIATES);
        $request->setResources($resources);

        $request = $this->callHook('search', $request);

        $response = $this->api->searchItems($request);

        return json_decode((string) $response, true);
    }

    /**
     * {@inheritdoc}
     */
    public function browse(string $node, string $sort = 'Featured')
    {
        /**
         * @var SearchItemsResource[] $resources
         */
        $resources = SearchItemsResource::getAllowableEnumValues();

        $request = new SearchItemsRequest();
        $request->setBrowseNodeId($node);
        $request->setSortBy($sort);
        $request->setPartnerTag(config('amazon-product.associate_tag'));
        $request->setPartnerType(PartnerType::ASSOCIATES);
        $request->setResources($resources);

        $request = $this->callHook('browse', $request);

        $response = $this->api->searchItems($request);

        return json_decode((string) $response, true);
    }

    /**
     * {@inheritdoc}
     */
    public function item(string $asin)
    {
        return $this->items([$asin]);
    }

    /**
     * {@inheritdoc}
     */
    public function items(array $asin)
    {
        /**
         * @var GetItemsResource[] $resources
         */
        $resources = GetItemsResource::getAllowableEnumValues();

        $request = new GetItemsRequest();
        $request->setItemIds($asin);
        $request->setPartnerTag(config('amazon-product.associate_tag'));
        $request->setPartnerType(PartnerType::ASSOCIATES);
        $request->setItemIdType($this->idType);
        $request->setResources($resources);

        $request = $this->callHook('item', $request);

        $response = $this->api->getItems($request);

        return json_decode((string) $response, true);
    }

    /**
     * @inheritDoc
     */
    public function setIdType(string $idType): Factory
    {
        $this->idType = $idType;

        return $this;
    }

    /**
     * @inheritDoc
     */
    public function getIdType(): string
    {
        return $this->idType;
    }
}
