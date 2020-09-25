<?php

namespace Kollex\DataProvider;

use Kollex\Model\ProductInterface;
use PHPUnit\Framework\TestCase;

class JSONDataProviderTest extends TestCase
{
    protected $jsonFile;
    protected function setUp(): void
    {
        $this->jsonFile = new JSONDataProvider(__DIR__.'/../data/wholesaler_b.json');
        parent::setUp();
    }

    public function testGetProducts()
    {
        $result = $this->jsonFile->getProducts();
        $this->assertIsArray($result);
        $this->assertInstanceOf(ProductInterface::class, $result[0]);
        $this->assertCount(4, $result);
    }

    public function testFailed(){
        $csv = new CSVDataProvider(__DIR__.'/../data/wrongfile.json');
        $this->expectException('exception');
        $result = $csv->getProducts();
    }
}
