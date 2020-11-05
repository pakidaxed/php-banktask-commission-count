<?php

declare(strict_types=1);

namespace BankTask\Task\Service;

class CurrencyConvert
{
    // PROPERTIES
    private static float $EUR = 1;
    private static float $USD = 1.1497;
    private static float $JPY = 129.53;

    /**
     * Converting FROM
     *
     * @param float $amount
     * @param string $currency
     * @return float
     */
    public static function convertFrom(float $amount, string $currency): float
    {
        return $amount / self::$$currency;
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
        return $amount * self::$$currency;
    }

}