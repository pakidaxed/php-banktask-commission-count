<?php

declare(strict_types=1);

namespace BankTask\Task\Operation;

use BankTask\Task\Service\CurrencyConvert;

class CashOut
{
    // PROPERTIES NATURAL
    private const FEE_NATURAL = 0.3; // Commission percent for Natural clients

    // PROPERTIES LEGAL
    private const FEE_LEGAL = 0.3; // Commission percent for Legal clients
    private const MIN_PER_OPERATION = 0.5; // Minimum amount per operation for Legal clients


    /**
     * Counting commission for Natural clients
     *
     * @param float $amount
     * @param string $currency
     * @param array $operation
     * @return float
     */
    public static function countCommissionNatural(float $amount, string $currency, array $operation): float
    {

        $amount = CurrencyConvert::convertFrom($amount, $currency);

        if ($operation['operations'] <= 3) {
            $amount = $amount - $operation['discount'];
            $amount = $amount < 0 ? 0 : $amount;
        }

        if ($currency !== 'EUR') {
            $amount = CurrencyConvert::convertTo($amount, $currency);
        }
        $commission = self::FEE_NATURAL / 100 * $amount;

        return round(ceil($commission * 100)) / 100;
    }

    /**
     * Counting commissions for Legal clients
     *
     * @param float $amount
     * @param string $currency
     * @return float
     */
    public static function countCommissionLegal(float $amount, string $currency): float
    {
        $amount = CurrencyConvert::convertFrom($amount, $currency);

        $commission = self::FEE_LEGAL / 100 * $amount;

        return $commission < self::MIN_PER_OPERATION ? self::MIN_PER_OPERATION : $commission;
    }
}
