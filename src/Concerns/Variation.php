<?php

namespace Revolution\Amazon\ProductAdvertising\Concerns;

use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\GetVariationsRequest;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\GetVariationsResource;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\GetVariationsResponse;
use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\PartnerType;
use Illuminate\Support\Facades\Config;

trait Variation
{
    /**
     * {@inheritdoc}
     */
    public function variations(string $asin, int $page = 1)
    {
        /**
         * @var GetVariationsResource[] $resources
         */
        $resources = GetVariationsResource::getAllowableEnumValues();

        $request = new GetVariationsRequest();
        $request->setASIN($asin);
        $request->setVariationPage($page);
        $request->setPartnerTag(Config::get('amazon-product.associate_tag'));
        $request->setPartnerType(PartnerType::ASSOCIATES);
        $request->setResources($resources);

        $request = $this->callHook('variations', $request);

        /**
         * @var GetVariationsResponse $response
         */
        $response = $this->api()->getVariations($request);

        return json_decode($response->__toString(), true);
    }
}
