<?php

require_once __DIR__ . '/vendor/autoload.php';

use Kollex\Service\FileLoader;


$dataRoot = __DIR__ . '/data';
$fileLoader = new FileLoader($dataRoot);
print_r($fileLoader->load());

