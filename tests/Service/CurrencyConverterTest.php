<?php


namespace BankTask\Tests\Service;


use BankTask\Task\Service\CurrencyConvert;
use PHPUnit\Framework\TestCase;

class CurrencyConverterTest extends TestCase
{
    public function testConvertFrom()
    {
        $result = CurrencyConvert::convertFrom(100, 'EUR');
        $this->assertEquals(100, $result);
    }

    public function testConvertTo()
    {
        $result = CurrencyConvert::convertTo(100, 'EUR');
        $this->assertEquals(100, $result);
    }


}