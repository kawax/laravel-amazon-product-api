<?php

namespace Revolution\Amazon\ProductAdvertising\tests;

use PHPUnit\Framework\TestCase;

use ApaiIO\ApaiIO;
use ApaiIO\Configuration\GenericConfiguration;
use ApaiIO\Request\GuzzleRequest;
use ApaiIO\ResponseTransformer\XmlToArray;

use ApaiIO\Operations\Search;
use ApaiIO\Operations\Lookup;

use Revolution\Amazon\ProductAdvertising\AmazonClient;

use GuzzleHttp\Client;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Response;

class AmazonTest extends TestCase
{
    /**
     * @var AmazonClient
     */
    protected $amazon;

    public function setUp()
    {
        parent::setUp();

        $this->setClientHandler('test');
    }

    /**
     * @param string $body
     */
    public function setClientHandler(string $body)
    {
        $mock = new MockHandler([
            new Response(200, [], $body),
        ]);

        $handler = HandlerStack::create($mock);
        $client = new Client(['handler' => $handler]);

        $request = new GuzzleRequest($client);
        $conf = new GenericConfiguration();

        $conf->setResponseTransformer(new XmlToArray())
             ->setRequest($request);

        $apaiio = new ApaiIO($conf);

        $this->amazon = new AmazonClient($apaiio);
    }

    public function testAmazonInstance()
    {
        $this->assertInstanceOf('Revolution\Amazon\ProductAdvertising\AmazonClient', $this->amazon);
    }

    public function testRun()
    {
        $this->setClientHandler(file_get_contents(__DIR__ . '/stubs/ItemSearch.xml'));

        $search = new Search();

        $search->setCategory('All');
        $search->setKeywords('amazon');
        $search->setResponseGroup(['Large']);

        $response = $this->amazon->run($search);

        //        dd($response);

        $this->assertArrayHasKey('Items', $response);
    }

    public function testBrowse()
    {
        $this->setClientHandler(file_get_contents(__DIR__ . '/stubs/BrowseNodeLookup.xml'));

        $response = $this->amazon->browse('1');

        //        dd($response);

        $this->assertArrayHasKey('BrowseNodes', $response);
    }

    public function testItem()
    {
        $this->setClientHandler(file_get_contents(__DIR__ . '/stubs/ItemLookup.xml'));

        $response = $this->amazon->item('1');

        //        dd($response);

        $this->assertArrayHasKey('Items', $response);
    }

    public function testSearch()
    {
        $this->setClientHandler(file_get_contents(__DIR__ . '/stubs/ItemSearch.xml'));

        $response = $this->amazon->search('All', 'keyword', 1);

        //        dd($response);

        $this->assertArrayHasKey('Items', $response);
    }

    public function testIdType()
    {
        $this->amazon->setIdType('EAN');

        $this->assertEquals($this->amazon->getIdType(), 'EAN');
    }

    public function testMacro()
    {
        AmazonClient::macro('test', function () {
            return 'test';
        });

        $this->assertTrue(AmazonClient::hasMacro('test'));
        $this->assertTrue(is_callable(AmazonClient::class, 'test'));
    }

    public function testHookable()
    {
        $this->amazon->hook('item', function (Lookup $lookup) {
            return $lookup->setMerchantId('Amazon');
        });

        $this->assertTrue($this->amazon->hasHook('item'));
    }
}
