<?php

declare(strict_types=1);

namespace BankTask\Task\Service;

class CurrencyConvert
{
    // PROPERTIES
    private const EUR = 1;
    private const USD = 1.1497;
    private const JPY = 129.53;

    /**
     * Converting FROM
     *
     * @param float $amount
     * @param string $currency
     * @return float
     */
    public static function convertFrom(float $amount, string $currency): float
    {
        return $amount / constant("self::$currency");
    }

    /**
     * Converting TO
     *
     * @param float $amount
     * @param string $currency
     * @return float
     */
    public static function convertTo(float $amount, string $currency): float
    {
        return $amount * constant("self::$currency");
    }
}
