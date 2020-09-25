<?php


namespace Kollex\DataProvider;


use Exception;

/**
 * Class FileDataProvider
 * @package Kollex\DataProvider
 */
abstract class FileDataProvider implements DataProviderInterface
{
    /**
     * @var string
     */
    protected $filePath;

    /**
     * FileDataProvider constructor.
     * @param $filePath
     */
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }

    /**
     * read the file
     * @return array|false
     * @throws Exception
     */
    protected function readFile()
    {
        try {
            return file($this->filePath);
        }catch (\Throwable $exception){
            throw new Exception($exception->getMessage(), $exception->getCode());
        }

    }

    /**
     * processing the file (override this method)
     * @return array|false
     */
    protected function processFile()
    {
        return $this->readFile();
    }

    /**
     * @inheritDoc
     */
    public function getProducts(): array
    {
        return $this->processFile();
    }
}