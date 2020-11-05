<?php

declare(strict_types=1);

namespace BankTask\Task\Task;

use BankTask\Task\Operation\CashIn;
use BankTask\Task\Operation\CashOut;
use BankTask\Task\Service\TrackOperations;
use Exception;

class CommissionCount
{
    private int    $userId;
    private string $userType;
    private string $operation;
    private float  $amount;
    private string $currency;
    private string $date;

    private float  $commission;

    public function __construct($operationData)
    {
        $this->userId = (int)$operationData[1];
        $this->userType = $operationData[2];
        $this->operation = $operationData[3];
        $this->amount = (float)$operationData[4];
        $this->currency = $operationData[5];
        $this->date = $operationData[0];
    }

    /**
     * Commission Counting task, like routing. Routes where to and how to count
     *
     * @return float
     * @throws Exception
     */
    public function getCommission(): float
    {
        if ($this->operation === 'cash_in') {
            $this->commission = CashIn::countCommission($this->amount);
        }

        if ($this->operation === 'cash_out') {

            $operation = TrackOperations::trackWeekly($this->userId, $this->date, $this->amount, $this->currency);

            if ($this->userType === 'natural') {
                $this->commission = CashOut::countCommissionNatural($this->amount, $this->currency, $operation);
            }
            if ($this->userType === 'legal') {
                $this->commission = CashOut::countCommissionLegal($this->amount, $this->currency);
            }
        }

        return $this->commission;
    }

}