<?php


namespace Kollex\Model;


/**
 * Class Product
 * @package Kollex\Model
 */
class Product implements ProductInterface, \JsonSerializable
{
    /**
     * @var string
     */
    protected $id;
    /**
     * @var string|null
     */
    protected $ean;
    /**
     * @var string
     */
    protected $manufacturer;
    /**
     * @var string
     */
    protected $name;
    /**
     * @var string
     */
    protected $packaging;
    /**
     * @var string
     */
    protected $baseProductPackaging;
    /**
     * @var string
     */
    protected $baseProductUnit;
    /**
     * @var float
     */
    protected $baseProductAmount;
    /**
     * @var int
     */
    protected $baseProductQuantity;

    /**
     * Product constructor.
     * @param string $id
     * @param string|null $ean
     * @param string $manufacturer
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
        string $manufacturer,
        string $name,
        string $packaging,
        string $baseProductPackaging,
        string $baseProductUnit,
        float $baseProductAmount,
        int $baseProductQuantity
    ) {
        $this->id = $id;
        $this->ean = $ean;
        $this->manufacturer = $manufacturer;
        $this->name = $name;
        $this->packaging = $packaging;
        $this->baseProductPackaging = $baseProductPackaging;
        $this->baseProductUnit = $baseProductUnit;
        $this->baseProductAmount = $baseProductAmount;
        $this->baseProductQuantity = $baseProductQuantity;
    }

    /**
     * @return string
     */
    public function getId(): string
    {
        return $this->id;
    }

    /**
     * @param string $id
     * @return Product
     */
    public function setId(string $id): Product
    {
        $this->id = $id;
        return $this;
    }

    /**
     * @return string|null
     */
    public function getEan(): ?string
    {
        return $this->ean;
    }

    /**
     * @param string|null $ean
     * @return Product
     */
    public function setEan(?string $ean): Product
    {
        $this->ean = $ean;
        return $this;
    }

    /**
     * @return string
     */
    public function getManufacturer(): string
    {
        return $this->manufacturer;
    }

    /**
     * @param string $manufacturer
     * @return Product
     */
    public function setManufacturer(string $manufacturer): Product
    {
        $this->manufacturer = $manufacturer;
        return $this;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     * @return Product
     */
    public function setName(string $name): Product
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @return string
     */
    public function getPackaging(): string
    {
        return $this->packaging;
    }

    /**
     * @param string $packaging
     * @return Product
     */
    public function setPackaging(string $packaging): Product
    {
        $this->packaging = $packaging;
        return $this;
    }

    /**
     * @return string
     */
    public function getBaseProductPackaging(): string
    {
        return $this->baseProductPackaging;
    }

    /**
     * @param string $baseProductPackaging
     * @return Product
     */
    public function setBaseProductPackaging(string $baseProductPackaging): Product
    {
        $this->baseProductPackaging = $baseProductPackaging;
        return $this;
    }

    /**
     * @return string
     */
    public function getBaseProductUnit(): string
    {
        return $this->baseProductUnit;
    }

    /**
     * @param string $baseProductUnit
     * @return Product
     */
    public function setBaseProductUnit(string $baseProductUnit): Product
    {
        $this->baseProductUnit = $baseProductUnit;
        return $this;
    }

    /**
     * @return float
     */
    public function getBaseProductAmount(): float
    {
        return $this->baseProductAmount;
    }

    /**
     * @param float $baseProductAmount
     * @return Product
     */
    public function setBaseProductAmount(float $baseProductAmount): Product
    {
        $this->baseProductAmount = $baseProductAmount;
        return $this;
    }

    /**
     * @return int
     */
    public function getBaseProductQuantity(): int
    {
        return $this->baseProductQuantity;
    }

    /**
     * @param int $baseProductQuantity
     * @return Product
     */
    public function setBaseProductQuantity(int $baseProductQuantity): Product
    {
        $this->baseProductQuantity = $baseProductQuantity;
        return $this;
    }


    /**
     * Serialize the object in JSON format
     * @return array
     */
    public function jsonSerialize()
    {
        return [
            'id' => $this->id,
            'ean' => $this->ean,
            'manufacturer' => $this->manufacturer,
            'name' => $this->name,
            'packaging' => $this->packaging,
            'baseProductPackaging' => $this->baseProductPackaging,
            'baseProductUnit' => $this->baseProductUnit,
            'baseProductAmount' => $this->baseProductAmount,
            'baseProductQuantity' => $this->baseProductQuantity
        ];
    }
}