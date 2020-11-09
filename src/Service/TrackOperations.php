<?php
declare(strict_types=1);

namespace BankTask\Task\Service;

use DateTime;
use Exception;

class TrackOperations
{
    // PROPERTIES
    private const FREE_OF_CHARGE = 1000; // Free cash out money in one week

    /**
     * Tracking the operations data, and counting by weeks for each user and checking for the
     * free cash out limit
     * Storing everything in session
     *
     * @param int $userId
     * @param string $date
     * @param float $amount
     * @param string $currency
     * @return array
     * @throws Exception
     */
    public static function trackWeekly(int $userId, string $date, float $amount, string $currency): array
    {
        // Getting the date format we need to store in session
        $date_exploded = explode('-', $date);
        $single_month = $date_exploded[1];

        $date = new DateTime($date);
        $year = $date->format("Y");
        $week = $date->format("W");

        if ($single_month == '12' && $week == '01') $year++;
        // End of getting date

        $amount_euros = CurrencyConvert::convertFrom($amount, $currency);

        // Long session names looks messy here. Used this, just because we're imitating the database
        // It should not be like that in the script
        // Some lines are way too long, but its easier to maintain this way.

        if (!isset($_SESSION['user'][$year][$week][$userId])) {
            $_SESSION['user'][$year][$week][$userId]['operations'] = 1;
            $_SESSION['user'][$year][$week][$userId]['free_cash_out'] = self::FREE_OF_CHARGE;
            $_SESSION['user'][$year][$week][$userId]['discount'] = $_SESSION['user'][$year][$week][$userId]['free_cash_out'] > $amount_euros ? $amount_euros : $_SESSION['user'][$year][$week][$userId]['free_cash_out'];
            $_SESSION['user'][$year][$week][$userId]['free_cash_out'] -= $amount_euros > self::FREE_OF_CHARGE ? self::FREE_OF_CHARGE : $amount_euros;
        } else {
            $_SESSION['user'][$year][$week][$userId]['operations']++;
            $_SESSION['user'][$year][$week][$userId]['discount'] = $_SESSION['user'][$year][$week][$userId]['free_cash_out'];
            $_SESSION['user'][$year][$week][$userId]['free_cash_out'] -= $amount_euros > $_SESSION['user'][$year][$week][$userId]['free_cash_out'] ? $_SESSION['user'][$year][$week][$userId]['free_cash_out'] : $amount_euros;
        }

        return [
            'operations' => $_SESSION['user'][$year][$week][$userId]['operations'],
            'discount' => $_SESSION['user'][$year][$week][$userId]['discount'],
        ];
    }
}