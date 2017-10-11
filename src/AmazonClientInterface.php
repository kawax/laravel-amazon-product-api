<?php

namespace Revolution\Amazon\ProductAdvertising;

use ApaiIO\ApaiIO;
use ApaiIO\Operations\OperationInterface;

interface AmazonClientInterface
{
    /**
     * @param ApaiIO $api
     *
     * @return void
     */
    public function config(ApaiIO $api);

    /**
     * @param OperationInterface $operation
     *
     * @return array
     */
    public function run(OperationInterface $operation): array;

    /**
     * @param string $category
     * @param string $keyword
     * @param int    $page
     *
     * @return array
     */
    public function search(string $category, string $keyword = null, int $page = 1): array;

    /**
     * @param string $node
     * @param string $response
     *
     * @return array
     */
    public function browse(string $node, string $response = 'TopSellers'): array;

    /**
     * @param string $asin
     *
     * @return array
     */
    public function item(string $asin): array;

    /**
     * @param array $asin
     *
     * @return array
     */
    public function items(array $asin): array;

    /**
     * ASIN (Default), SKU, UPC, EAN, and ISBN
     *
     * @param string $idType
     *
     * @return AmazonClientInterface
     */
    public function setIdType(string $idType): AmazonClientInterface;
}
