<?php

namespace Kollex\Service;

use PHPUnit\Framework\TestCase;

class FileLoaderTest extends TestCase
{

    public function testLoad()
    {
        $fileLoader = new FileLoader(__DIR__.'/../data');
        $result = $fileLoader->load();

        $this->assertJson($result);
        $jsonArray = json_decode($result, true);
        $this->assertCount(8, $jsonArray);
    }
}
