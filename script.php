<?php
// Starting session, to store the data about clients operation dates, to check the free limits
session_start();

require_once __DIR__ . '/vendor/autoload.php';

use BankTask\Task\Task\CommissionCount;

// Just checking for input and checking if the file exists
$input = $argv[1] ?? die("No CSV file entered. Please enter script.php <your_data.csv>\n");

if (!file_exists($input)) {
    die("The file you entered does not exists, please use another one\n");
}
// If everything is ok, lets start!

$operations = array_map('str_getcsv', file($input));

foreach ($operations as $operation_key => $operation) {
    $commission = new CommissionCount($operation);
    // Adding the needed file format for echoing the commission
    echo sprintf("%0.2f", $commission->getCommission()) . "\n";
}

session_destroy();
