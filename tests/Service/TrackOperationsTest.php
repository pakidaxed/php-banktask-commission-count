<?php

namespace BankTask\Tests\Service;

use BankTask\Task\Service\TrackOperations;
use PHPUnit\Framework\TestCase;

class TrackOperationsTest extends TestCase
{
    public function testTrackWeekly()
    {
        $result = TrackOperations::trackWeekly(10, '2019-03-14', 20000, 'EUR');
        $this->assertArrayHasKey('operations', $result);
        $this->assertArrayHasKey('discount', $result);
    }
}
