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
     * @return mixed
     */
    public function run(OperationInterface $operation);

    /**
     * @param string $category
     * @param string $keyword
     * @param int    $page
     *
     * @return mixed
     */
    public function search(string $category, string $keyword = null, int $page = 1);

    /**
     * @param string $node
     * @param string $response
     *
     * @return mixed
     */
    public function browse(string $node, string $response = 'TopSellers');

    /**
     * @param string $asin
     *
     * @return mixed
     */
    public function item(string $asin);

    /**
     * @param array $asin
     *
     * @return mixed
     */
    public function items(array $asin);

    /**
     * ASIN (Default), SKU, UPC, EAN, and ISBN
     *
     * @param string $idType
     *
     * @return AmazonClientInterface
     */
    public function setIdType(string $idType): AmazonClientInterface;

    /**
     * @return string
     */
    public function getIdType(): string ;
}
