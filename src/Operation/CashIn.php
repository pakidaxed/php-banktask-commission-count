<?php

declare(strict_types=1);

namespace BankTask\Task\Operation;


class CashIn
{
    // PROPERTIES
    private const FEE_PERCENT = 0.03; // Commission percent %
    private const MAX_FEE_AMOUNT = 5; // Maximum free amount to charge

    /**
     * Counting CASH IN commissions
     *
     * @param float $amount
     * @return float
     */
    public static function countCommission(float $amount): float
    {
        $commission = self::FEE_PERCENT / 100 * $amount;
        return $commission > self::MAX_FEE_AMOUNT ? self::MAX_FEE_AMOUNT : $commission;
    }
}