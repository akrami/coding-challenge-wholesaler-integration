<?php


namespace Kollex\Model;


/**
 * Interface ProductInterface
 * @package Kollex\Model
 */
interface ProductInterface
{
    /**
     * ProductInterface constructor.
     * @param string $id
     * @param string|null $ean
     * @param string $manufacture
     * @param string $name
     * @param string $packaging
     * @param string $baseProductPackaging
     * @param string $baseProductUnit
     * @param float $baseProductAmount
     * @param int $baseProductQuantity
     */
    public function __construct(
        string $id,
        ?string $ean,
        string $manufacture,
        string $name,
        string $packaging,
        string $baseProductPackaging,
        string $baseProductUnit,
        float $baseProductAmount,
        int $baseProductQuantity
    );
}
