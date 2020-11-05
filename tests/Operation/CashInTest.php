<?php


namespace BankTask\Tests\Operation;


use BankTask\Task\Operation\CashIn;
use PHPUnit\Framework\TestCase;

class CashInTest extends TestCase
{
    public function testCountCommission()
    {
        $result = CashIn::countCommission(50000);
        $this->assertEquals(5, $result);
    }
}