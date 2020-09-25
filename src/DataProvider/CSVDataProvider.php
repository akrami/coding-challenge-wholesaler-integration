<?php


namespace Kollex\DataProvider;

use Kollex\Model\Product;
use Kollex\Model\Unit;

/**
 * Class CSVDataProvider
 * @package Kollex\DataProvider
 */
class CSVDataProvider extends FileDataProvider
{
    /** Process CSV File to product
     * @return array|false
     */
    protected function processFile()
    {
        $lines = parent::readFile();
        // headers are not needed in this case but you can extract them this way
        // $headers = array_map('trim',explode(';', $lines[0]));
        // unset header
        unset($lines[0]);
        $result = [];
        foreach ($lines as $line) {
            // extracting each field from line
            $fields = explode(';', $line);
            $tempArray = [];
            foreach ($fields as $key => $field) {
                $tempArray[] = $field;
            }
            $id = $tempArray[0];
            $ean = $tempArray[1];
            $manufacturer = $tempArray[2];
            $name = $tempArray[3];
            if (strtolower($tempArray[5]) === 'single') {
                $packaging = Unit::NONE;
                $baseProductQuantity = 1;
            } else {
                $pkg = explode(' ', $tempArray[5]);
                $baseProductQuantity = intval($pkg[1]);
                switch (strtolower($pkg[0])) {
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
            }
            switch (strtolower($tempArray[7])) {
                case 'bottle':
                    $baseProductPackaging = Unit::BOTTLE;
                    break;
                case 'can':
                    $baseProductPackaging = Unit::CAN;
                    break;
                default:
                    $baseProductPackaging = Unit::NONE;
            }
            $baseProductUnit = $tempArray[8][strlen($tempArray[8]) - 1] === 'l' ? Unit::LITER : Unit::GRAM;
            $baseProductAmount = floatval(substr($tempArray[8], 0, strlen($tempArray[8]) - 1));
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