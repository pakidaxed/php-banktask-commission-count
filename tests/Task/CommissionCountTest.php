<?php


namespace BankTask\Tests\Task;


use BankTask\Task\Task\CommissionCount;
use PHPUnit\Framework\TestCase;

class CommissionCountTest extends TestCase
{
    public function testGetCommission()
    {
        $csv_file_example = ['2014-12-31',4,'natural','cash_out',1200.00,'EUR'];

        $counter = new CommissionCount($csv_file_example);
        $result = $counter->getCommission();

        $this->assertNotEquals(0, $result);
    }
}