<?php


namespace Kollex\Service;


use Kollex\DataProvider\CSVDataProvider;
use Kollex\DataProvider\JSONDataProvider;

/**
 * Class FileLoader
 * @package Kollex\Service
 */
class FileLoader
{
    /**
     * @var string
     */
    protected $path;

    /**
     * FileLoader constructor.
     * @param $path
     */
    public function __construct($path)
    {
        $this->path = $path;
    }

    /**
     * Load all files in path
     * @param $path
     * @return array
     */
    private function recursiveLoadFiles($path)
    {
        if (is_file($path)) {
            return [$path];
        }
        $result = [];
        $files = array_diff(scandir($path), ['..', '.']);
        foreach ($files as $file) {
            $result = array_merge($result, $this->recursiveLoadFiles($path . '/' . $file));
        }
        return $result;
    }

    /**
     * load files and return json result
     * @return false|string
     */
    public function load()
    {
        $result = [];
        $fileList = $this->recursiveLoadFiles($this->path);

        foreach ($fileList as $file) {
            $filePath = pathinfo($file);
            if (strtolower($filePath['extension']) === 'csv') {
                $csvFile = new CSVDataProvider($file);
                $result = array_merge($result, $csvFile->getProducts());
            } elseif (strtolower($filePath['extension']) === 'json') {
                $jsonFile = new JSONDataProvider($file);
                $result = array_merge($result, $jsonFile->getProducts());
            }
        }

        return json_encode($result);
    }

}