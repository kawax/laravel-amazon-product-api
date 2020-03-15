<?php

namespace Revolution\Amazon\ProductAdvertising\Concerns;

use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\GetItemsRequest;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\GetItemsResource;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\GetItemsResponse;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\PartnerType;
use Illuminate\Support\Facades\Config;

trait Item
{
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
        $request->setPartnerTag(Config::get('amazon-product.associate_tag'));
        $request->setPartnerType(PartnerType::ASSOCIATES);
        $request->setItemIdType($this->idType);
        $request->setResources($resources);

        $request = $this->callHook('item', $request);

        /**
         * @var GetItemsResponse $response
         */
        $response = $this->api()->getItems($request);

        return json_decode($response->__toString(), true);
    }
}
