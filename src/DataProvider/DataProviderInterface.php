<?php


namespace Kollex\DataProvider;

use Kollex\Model\ProductInterface;

/**
 * Interface DataProviderInterface
 * @package Kollex\DataProvider
 */
interface DataProviderInterface
{
    /**
     * @return ProductInterface[]
     */
    public function getProducts(): array;
}
