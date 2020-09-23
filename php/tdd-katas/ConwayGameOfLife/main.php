#!/usr/bin/php
<?php
declare(strict_types=1);

/**
 * Very simple script, just for seeing the Game Of Life working in a console
 *
 * Script does not have a key listener, so stop script using ctrl+c
 */

require __DIR__.'/../../vendor/autoload.php';

$gameOfLife = new GameOfLife();
$gameOfLife->giveLifeTo('4.5');
$gameOfLife->giveLifeTo('4.6');
$gameOfLife->giveLifeTo('4.7');
$gameOfLife->giveLifeTo('4.8');
$gameOfLife->giveLifeTo('4.9');
$gameOfLife->giveLifeTo('4.10');
$gameOfLife->giveLifeTo('4.11');
$gameOfLife->giveLifeTo('4.12');

$gameOfLife->giveLifeTo('5.5');
$gameOfLife->giveLifeTo('5.7');
$gameOfLife->giveLifeTo('5.8');
$gameOfLife->giveLifeTo('5.9');
$gameOfLife->giveLifeTo('5.10');
$gameOfLife->giveLifeTo('5.12');

$gameOfLife->giveLifeTo('6.5');
$gameOfLife->giveLifeTo('6.6');
$gameOfLife->giveLifeTo('6.7');
$gameOfLife->giveLifeTo('6.8');
$gameOfLife->giveLifeTo('6.9');
$gameOfLife->giveLifeTo('6.10');
$gameOfLife->giveLifeTo('6.11');
$gameOfLife->giveLifeTo('6.12');

while(true) {
    system('clear');
    printPopulation($gameOfLife->getPopulation());
    usleep(100000);

    try {
        $gameOfLife->generateNextGeneration();
    } catch (\Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
        exit(1);
    }
}

function printPopulation(array $population)
{
    for ($x = 0; $x < 11; $x++) {
        for ($y = 0; $y < 18; $y++) {
            $cell = $x . '.' . $y;
            if (array_key_exists($cell, $population)) {
                if ($population[$cell]) {
                    echo "O";
                }
            } else {
                echo ' ';
            }
        }
        echo "\n";
    }
}

exit(0);

?>
