<?php

namespace Revolution\Amazon\ProductAdvertising\Tests;

use Amazon\ProductAdvertisingAPI\v1\com\amazon\paapi5\v1\api\DefaultApi;
use Amazon\ProductAdvertisingAPI\v1\Configuration;
use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;
use Revolution\Amazon\ProductAdvertising\AmazonClient;
use Revolution\Amazon\ProductAdvertising\Contracts\Factory;
use Revolution\Amazon\ProductAdvertising\Facades\AmazonProduct;

class AmazonTest extends TestCase
{
    protected AmazonClient $amazon;

    protected function setUp(): void
    {
        parent::setUp();

        $this->setClientHandler('test');
    }

    public function setClientHandler(string $body)
    {
        $mock = new MockHandler(
            [
                new Response(200, [], $body),
            ]
        );

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $config = new Configuration;

        $api = new DefaultApi($client, $config);

        $this->amazon = new AmazonClient($api);
        $this->amazon->config($api);
    }

    public function test_amazon_instance()
    {
        $this->assertInstanceOf(AmazonClient::class, $this->amazon);
    }

    public function test_browse()
    {
        $this->setClientHandler(file_get_contents(__DIR__.'/stubs/BrowseNodeResult.json'));

        $response = $this->amazon->browse(node: '1');

        $this->assertArrayHasKey('BrowseNodesResult', $response);
    }

    public function test_item()
    {
        $this->setClientHandler(file_get_contents(__DIR__.'/stubs/ItemsResult.json'));

        $response = $this->amazon->item(asin: '1');

        $this->assertArrayHasKey('ItemsResult', $response);
    }

    public function test_items()
    {
        $this->setClientHandler(file_get_contents(__DIR__.'/stubs/ItemsResult.json'));

        $response = $this->amazon->items(asin: ['1']);

        $this->assertArrayHasKey('ItemsResult', $response);
    }

    public function test_search()
    {
        $this->setClientHandler(file_get_contents(__DIR__.'/stubs/SearchResult.json'));

        $response = $this->amazon->search(category: 'All', keyword: 'keyword', page: 1);

        $this->assertArrayHasKey('SearchResult', $response);
    }

    public function test_variations()
    {
        $this->setClientHandler(file_get_contents(__DIR__.'/stubs/VariationsResult.json'));

        $response = $this->amazon->variations(asin: '1', page: 1);

        $this->assertArrayHasKey('VariationsResult', $response);
    }

    public function test_id_type()
    {
        $this->amazon->setIdType(idType: 'EAN');

        $this->assertEquals('EAN', $this->amazon->getIdType());
    }

    public function test_macro()
    {
        AmazonClient::macro(
            'test',
            function () {
                return 'test';
            }
        );

        $this->assertTrue(AmazonClient::hasMacro('test'));
        $this->assertTrue(is_callable([AmazonClient::class, 'test']));
    }

    public function test_hookable()
    {
        $this->setClientHandler(file_get_contents(__DIR__.'/stubs/ItemsResult.json'));

        $this->amazon->hook(
            'item',
            function ($request) {
                return $request->setMerchant('Amazon');
            }
        );

        $response = $this->amazon->item(asin: '1');

        $this->assertTrue($this->amazon->hasHook('item'));
    }

    public function test_client()
    {
        $amazon = app(AmazonClient::class);

        $this->assertInstanceOf(AmazonClient::class, $amazon);
    }

    public function test_factory()
    {
        $amazon = app(Factory::class);

        $this->assertInstanceOf(AmazonClient::class, $amazon);
    }

    public function test_api_using()
    {
        $amazon = app(Factory::class);

        $amazon->apiUsing(
            function () {
                return app(DefaultApi::class);
            }
        );

        $this->assertInstanceOf(DefaultApi::class, $amazon->api());
    }

    public function test_facade()
    {
        AmazonProduct::shouldReceive('browse')->andReturn([]);

        $this->assertSame([], AmazonProduct::browse('1'));
    }
}
