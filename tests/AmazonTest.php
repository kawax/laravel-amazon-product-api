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

class AmazonTest extends TestCase
{
    /**
     * @var AmazonClient
     */
    protected $amazon;

    public function setUp(): void
    {
        parent::setUp();

        $this->setClientHandler('test');
    }

    /**
     * @param  string  $body
     */
    public function setClientHandler(string $body)
    {
        $mock = new MockHandler(
            [
                new Response(200, [], $body),
            ]
        );

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $config = new Configuration();

        $api = new DefaultApi($client, $config);

        $this->amazon = new AmazonClient($api);
        $this->amazon->config($api);
    }

    public function testAmazonInstance()
    {
        $this->assertInstanceOf(AmazonClient::class, $this->amazon);
    }

    public function testBrowse()
    {
        $this->setClientHandler(file_get_contents(__DIR__.'/stubs/BrowseNodeResult.json'));

        $response = $this->amazon->browse('1');

        $this->assertArrayHasKey('BrowseNodesResult', $response);
    }

    public function testItem()
    {
        $this->setClientHandler(file_get_contents(__DIR__.'/stubs/ItemsResult.json'));

        $response = $this->amazon->item('1');

        $this->assertArrayHasKey('ItemsResult', $response);
    }

    public function testItems()
    {
        $this->setClientHandler(file_get_contents(__DIR__.'/stubs/ItemsResult.json'));

        $response = $this->amazon->items(['1']);

        $this->assertArrayHasKey('ItemsResult', $response);
    }

    public function testSearch()
    {
        $this->setClientHandler(file_get_contents(__DIR__.'/stubs/SearchResult.json'));

        $response = $this->amazon->search('All', 'keyword', 1);

        $this->assertArrayHasKey('SearchResult', $response);
    }

    public function testVariations()
    {
        $this->setClientHandler(file_get_contents(__DIR__.'/stubs/VariationsResult.json'));

        $response = $this->amazon->variations('1', 1);

        $this->assertArrayHasKey('VariationsResult', $response);
    }

    public function testIdType()
    {
        $this->amazon->setIdType('EAN');

        $this->assertEquals($this->amazon->getIdType(), 'EAN');
    }

    public function testMacro()
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

    public function testHookable()
    {
        $this->setClientHandler(file_get_contents(__DIR__.'/stubs/ItemsResult.json'));

        $this->amazon->hook(
            'item',
            function ($request) {
                return $request->setMerchant('Amazon');
            }
        );

        $response = $this->amazon->item('1');

        $this->assertTrue($this->amazon->hasHook('item'));
    }

    public function testClient()
    {
        $amazon = app(AmazonClient::class);

        $this->assertInstanceOf(AmazonClient::class, $amazon);
    }

    public function testFactory()
    {
        $amazon = app(Factory::class);

        $this->assertInstanceOf(AmazonClient::class, $amazon);
    }

    public function testApiUsing()
    {
        $amazon = app(Factory::class);

        $amazon->apiUsing(
            function () {
                return app(DefaultApi::class);
            }
        );

        $this->assertInstanceOf(DefaultApi::class, $amazon->api());
    }
}
