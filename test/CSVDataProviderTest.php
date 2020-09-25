<?php

namespace Kollex\DataProvider;

use Kollex\Model\Product;
use Kollex\Model\ProductInterface;
use PHPUnit\Framework\TestCase;

class CSVDataProviderTest extends TestCase
{
    protected $csvFile;
    protected function setUp(): void
    {
        $this->csvFile = new CSVDataProvider(__DIR__.'/../data/wholesaler_a.csv');
        parent::setUp();
    }

    public function testGetProducts()
    {
        $result = $this->csvFile->getProducts();
        $this->assertIsArray($result);
        $this->assertInstanceOf(ProductInterface::class, $result[0]);
        $this->assertCount(4, $result);
    }

    public function testFailed(){
        $csv = new CSVDataProvider(__DIR__.'/../data/wrongfile.csv');
        $this->expectException('exception');
        $result = $csv->getProducts();
    }
}
