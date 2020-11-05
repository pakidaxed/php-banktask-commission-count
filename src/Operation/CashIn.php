<?php

declare(strict_types=1);

namespace BankTask\Task\Operation;


class CashIn
{
    // PROPERTIES
    private static float $feePercent = 0.03; // Commission percent %
    private static float $maxFeeAmount = 5; // Maximum free amount to charge

    /**
     * Counting CASH IN commissions
     *
     * @param float $amount
     * @return float
     */
    public static function countCommission(float $amount): float
    {
        $commission = self::$feePercent / 100 * $amount;
        return $commission > self::$maxFeeAmount ? self::$maxFeeAmount : $commission;
    }
}