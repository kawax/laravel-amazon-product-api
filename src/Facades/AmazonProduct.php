<?php

namespace Revolution\Amazon\ProductAdvertising\Facades;

use Illuminate\Support\Facades\Facade;
use Revolution\Amazon\ProductAdvertising\Contracts\Factory;

/**
 * @method static array browse(string $node, string $sort = 'TopSellers')
 * @method static array item(string $asin)
 * @method static array items(array $asin)
 * @method static array search(string $category, string $keyword = null, int $page = 1)
 * @method static array variations(string $asin, int $page = 1)
 * @method static static setIdType(string $idType)
 */
class AmazonProduct extends Facade
{
    /**
     * Get the registered name of the component.
     *
     * @return string
     */
    protected static function getFacadeAccessor(): string
    {
        return Factory::class;
    }
}
