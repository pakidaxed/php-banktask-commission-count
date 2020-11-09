<?php

namespace BankTask\Tests\Operation;

use BankTask\Task\Operation\CashOut;
use PHPUnit\Framework\TestCase;

class CashOutTest extends TestCase
{
    public function testCountCommissionNatural()
    {
        $result = CashOut::countCommissionNatural(1200.00, 'EUR', ['operations' => 1, 'discount' => 1000]);

        $this->assertStringMatchesFormat('%f', (string)$result);
    }
    public function testCountCommissionLegal()
    {
        $result = CashOut::countCommissionLegal(100.00, 'EUR');
        $this->assertEquals(0.5, $result);
    }
}
