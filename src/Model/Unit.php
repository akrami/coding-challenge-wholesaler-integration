<?php


namespace Kollex\Model;


/**
 * Class Unit
 * @package Kollex\Model
 */
class Unit extends AbstractEnum
{
    public const NONE = '';
    public const CASE = 'CA';
    public const BOX = 'BX';
    public const BOTTLE = 'BO';
    public const CAN = 'CN';
    public const BUNDLE = 'BD';
    public const BUCKET = 'BC';
    public const CONTAINER = 'CH';
    public const CUP = 'CU';
    public const GRAM = 'GR';
    public const LITER = 'LT';

    // other units that can be imported from http://t3.apptrix.com/syteline/Language/en-US/fields/i/iso_um_ums.htm
}