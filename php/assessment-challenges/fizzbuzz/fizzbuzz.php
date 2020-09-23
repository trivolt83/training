<?php

declare(strict_types=1);

require_once __DIR__.'/../../vendor/autoload.php';

/**
 * Simply print the numbers (or 'Fizz' and/or 'Buzz')
 *
 * @param int $rows
 */
function printRows(int $rows): void
{
    $fizzBuzzer = new FizzBuzzer();
    for ($x = 1; $x < $rows; $x++) {
        echo $fizzBuzzer->getFizzBuzzValue($x) . "\n";
    }
}

// print the values up to given number
if (isset($argv[1])) {
    if ($rows = (int)$argv[1]) {
        printRows($rows);
    } else {
        echo "\nPlease provide a valid number of rows!\n\n";
    }
} else {
    echo "\nPlease provide number of rows!\n\n";
}
