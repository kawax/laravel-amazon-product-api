<?php

namespace Revolution\Amazon\ProductAdvertising\Concerns;

use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\GetBrowseNodesRequest;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\GetBrowseNodesResource;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\GetBrowseNodesResponse;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\PartnerType;
use Illuminate\Support\Facades\Config;

trait Browse
{
    /**
     * {@inheritdoc}
     */
    public function browse(string $node, string $sort = 'TopSellers')
    {
        /**
         * @var GetBrowseNodesResource[] $resources
         */
        $resources = GetBrowseNodesResource::getAllowableEnumValues();

        $request = new GetBrowseNodesRequest();
        $request->setBrowseNodeIds([$node]);
        $request->setPartnerTag(Config::get('amazon-product.associate_tag'));
        $request->setPartnerType(PartnerType::ASSOCIATES);
        $request->setResources($resources);

        $request = $this->callHook('browse', $request);

        /**
         * @var GetBrowseNodesResponse $response
         */
        $response = $this->api()->getBrowseNodes($request);

        return json_decode($response->__toString(), true);
    }
}
