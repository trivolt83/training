<?php

declare(strict_types=1);

require_once __DIR__.'/../../vendor/autoload.php';

/**
 * Dev assessment challenge:
 *
 * Print Pascal's triangle up to a given number of rows.
 *
 * In Pascal's Triangle each number is computed by adding the numbers
 * to the right and left of the current position in the previous row.
 *
 *           1
 *         1   1
 *       1   2   1
 *     1   3   3   1
 *   1   4   6   4   1
 * 1   5  10  10   5   1
 *
 * Use a function for calculating the value for a given row and column.
 *
 */

$pascalTriangle = new PascalsTriangle;
$formatter = new Formatter;

if (isset($argv[1])) {
    if ($rows = (int)$argv[1]) {
        echo $formatter->formatTriangle($pascalTriangle->getTriangle($rows));
    } else {
        echo "\nPlease provide a valid number of rows!\n\n";
    }
} else {
    echo "\nPlease provide number of rows!\n\n";
}
