<?php
namespace Revolution\Amazon\ProductAdvertising\ResponseTransformer;

use ApaiIO\ResponseTransformer\ResponseTransformerInterface;

use Illuminate\Support\Collection;

class XmlToCollection implements ResponseTransformerInterface
{
    /**
     * @param mixed $response
     *
     * @return \Illuminate\Support\Collection
     */
    public function transform($response): Collection
    {
        $dom = simplexml_load_string($response);

        $elements = collect(json_decode(json_encode($dom), true));

        return $elements;
    }
}
