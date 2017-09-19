<?php

namespace Revolution\Amazon\ProductAdvertising;

use ApaiIO\ApaiIO;

use ApaiIO\Operations\OperationInterface;

use ApaiIO\Operations\Search;
use ApaiIO\Operations\Lookup;
use ApaiIO\Operations\BrowseNodeLookup;

class AmazonClient implements AmazonClientInterface
{
    /**
     * @var ApaiIO
     */
    protected $api;

    /**
     * constructor.
     *
     * @param ApaiIO $api
     *
     */
    public function __construct(ApaiIO $api)
    {
        $this->api = $api;
    }

    /**
     * {@inheritdoc}
     */
    public function config(ApaiIO $api)
    {
        $this->api = $api;
    }

    /**
     * {@inheritdoc}
     */
    public function run(OperationInterface $operation): array
    {
        try {
            $result = $this->api->runOperation($operation);
        } catch (\Exception $e) {
            $result = [];
        }

        return $result;
    }

    /**
     * {@inheritdoc}
     */
    public function search(string $category, string $keyword = null, int $page = 1): array
    {
        $search = new Search();

        $search->setCategory($category);
        $search->setKeywords($keyword);
        $search->setResponseGroup(['Large']);
        if ($page > 0) {
            $search->setPage($page);
        }

        return $this->run($search);
    }

    /**
     * {@inheritdoc}
     */
    public function browse(string $node): array
    {
        $browse = new BrowseNodeLookup();

        $browse->setNodeId($node);
        $browse->setResponseGroup(['TopSellers']);

        return $this->run($browse);
    }

    /**
     * {@inheritdoc}
     */
    public function item(string $asin): array
    {
        $lookup = new Lookup();

        $lookup->setItemId($asin);
        $lookup->setResponseGroup(['Large']);

        return $this->run($lookup);
    }

    /**
     * {@inheritdoc}
     */
    public function items(array $asin): array
    {
        $lookup = new Lookup();

        $lookup->setItemIds($asin);
        $lookup->setResponseGroup(['Large']);

        return $this->run($lookup);
    }
}
