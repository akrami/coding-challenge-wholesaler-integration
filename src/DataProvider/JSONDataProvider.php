<?php


namespace Kollex\DataProvider;


use Kollex\Model\Product;
use Kollex\Model\Unit;

/**
 * Class JSONDataProvider
 * @package Kollex\DataProvider
 */
class JSONDataProvider extends FileDataProvider
{
    /**
     * Process JSON File to product
     * @return array|false
     */
    protected function processFile()
    {
        $content = implode('', parent::readFile());
        $json = json_decode($content, true);
        $products = $json['data'];
        $result = [];
        foreach ($products as $product) {
            $id = $product['PRODUCT_IDENTIFIER'];
            $ean = $product['EAN_CODE_GTIN'];
            $manufacturer = $product['BRAND'];
            $name = $product['NAME'];
            switch (strtolower($product['PACKAGE'])) {
                case 'case':
                    $packaging = Unit::CASE;
                    break;
                case 'box':
                    $packaging = Unit::BOX;
                    break;
                case 'bottle':
                    $packaging = Unit::BOTTLE;
                    break;
                default:
                    $packaging = Unit::NONE;
            }
            $baseProductQuantity = intval($product['BOTTLE_AMOUNT']);
            switch (strtolower($product['VESSEL'])) {
                case 'bottle':
                    $baseProductPackaging = Unit::BOTTLE;
                    break;
                case 'can':
                    $baseProductPackaging = Unit::CAN;
                    break;
                default:
                    $baseProductPackaging = Unit::NONE;
            }
            $baseProductUnit = Unit::LITER;
            $baseProductAmount = intval($product['LITERS_PER_BOTTLE']);
            $tempProduct = new Product(
                $id,
                $ean,
                $manufacturer,
                $name,
                $packaging,
                $baseProductPackaging,
                $baseProductUnit,
                $baseProductAmount,
                $baseProductQuantity
            );
            $result[] = $tempProduct;
        }

        return $result;
    }
}